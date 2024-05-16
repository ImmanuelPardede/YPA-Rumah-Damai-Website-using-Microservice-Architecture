package controller

import (
	"net/http"
	"strconv"

	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Donasi/dto"
	"github.com/iqbalsiagian17/Service_Donasi/helper"
	"github.com/iqbalsiagian17/Service_Donasi/model"
	"github.com/iqbalsiagian17/Service_Donasi/service"
)

// DonasiController is a contract about something that this controller can do
type DonasiController interface {
	All(ctx *gin.Context)
	FindByID(ctx *gin.Context)
	Insert(ctx *gin.Context)
	Update(ctx *gin.Context)
	Delete(ctx *gin.Context)
}

type donasiController struct {
	DonasiService service.DonasiService
}

// NewDonasiController creates a new instance of DonasiController
func NewDonasiController(DonasiService service.DonasiService) DonasiController {
	return &donasiController{
		DonasiService: DonasiService,
	}
}

func (c *donasiController) All(ctx *gin.Context) {
	donasis := c.DonasiService.All()
	ctx.JSON(http.StatusOK, donasis)
}

func (c *donasiController) FindByID(ctx *gin.Context) {
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}

	donasi := c.DonasiService.FindByID(id)
	if donasi.ID == 0 {
		res := helper.BuildErrorResponse("Data not found", "No data with given ID", helper.EmptyObj{})
		ctx.JSON(http.StatusNotFound, res)
		return
	}

	ctx.JSON(http.StatusOK, donasi)
}

func (c *donasiController) Insert(ctx *gin.Context) {
	var donasiCreateDTO dto.DonasiCreateDTO
	errDTO := ctx.ShouldBind(&donasiCreateDTO)
	if errDTO != nil {
		res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	result := c.DonasiService.Insert(donasiCreateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusCreated, response)
}

func (c *donasiController) Update(ctx *gin.Context) {
	var donasiUpdateDTO dto.DonasiUpdateDTO
	errDTO := ctx.ShouldBind(&donasiUpdateDTO)
	if errDTO != nil {
		res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	idStr := ctx.Param("id")
	id, errID := strconv.ParseUint(idStr, 10, 64)
	if errID != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	donasiUpdateDTO.ID = uint(id) // Convert id to uint
	result := c.DonasiService.Update(donasiUpdateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusOK, response)
}

func (c *donasiController) Delete(ctx *gin.Context) {
	var donasi model.Donasi
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	donasi.ID = uint(id)
	c.DonasiService.Delete(donasi)
	res := helper.BuildResponse(true, "Deleted", helper.EmptyObj{})
	ctx.JSON(http.StatusOK, res)
}
