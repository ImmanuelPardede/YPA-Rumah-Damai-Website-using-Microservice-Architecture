package controller

import (
	"net/http"
	"strconv"

	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Jenis_Kelamin/dto"
	"github.com/iqbalsiagian17/Service_Jenis_Kelamin/helper"
	"github.com/iqbalsiagian17/Service_Jenis_Kelamin/model"
	"github.com/iqbalsiagian17/Service_Jenis_Kelamin/service"
)

// JenisKelaminController is a contract about something that this controller can do
type JenisKelaminController interface {
	All(ctx *gin.Context)
	FindByID(ctx *gin.Context)
	Insert(ctx *gin.Context)
	Update(ctx *gin.Context)
	Delete(ctx *gin.Context)
}

type jenisKelaminController struct {
	JenisKelaminService service.JenisKelaminService
}

// NewJenisKelaminController creates a new instance of JenisKelaminController
func NewJenisKelaminController(JenisKelaminService service.JenisKelaminService) JenisKelaminController {
	return &jenisKelaminController{
		JenisKelaminService: JenisKelaminService,
	}
}

func (c *jenisKelaminController) All(ctx *gin.Context) {
	jenisKelamins := c.JenisKelaminService.All()
	ctx.JSON(http.StatusOK, jenisKelamins)
}

func (c *jenisKelaminController) FindByID(ctx *gin.Context) {
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}

	jenisKelamin := c.JenisKelaminService.FindByID(id)
	if jenisKelamin.ID == 0 {
		res := helper.BuildErrorResponse("Data not found", "No data with given ID", helper.EmptyObj{})
		ctx.JSON(http.StatusNotFound, res)
		return
	}

	ctx.JSON(http.StatusOK, jenisKelamin)
}

func (c *jenisKelaminController) Insert(ctx *gin.Context) {
	var jenisKelaminCreateDTO dto.JenisKelaminCreateDTO
	errDTO := ctx.ShouldBind(&jenisKelaminCreateDTO)
	if errDTO != nil {
		res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	result := c.JenisKelaminService.Insert(jenisKelaminCreateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusCreated, response)
}

func (c *jenisKelaminController) Update(ctx *gin.Context) {
	var jenisKelaminUpdateDTO dto.JenisKelaminUpdateDTO
	errDTO := ctx.ShouldBind(&jenisKelaminUpdateDTO)
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
	jenisKelaminUpdateDTO.ID = uint(id) // Convert id to uint
	result := c.JenisKelaminService.Update(jenisKelaminUpdateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusOK, response)
}

func (c *jenisKelaminController) Delete(ctx *gin.Context) {
	var jenisKelamin model.JenisKelamin
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	jenisKelamin.ID = uint(id)
	c.JenisKelaminService.Delete(jenisKelamin)
	res := helper.BuildResponse(true, "Deleted", helper.EmptyObj{})
	ctx.JSON(http.StatusOK, res)
}
