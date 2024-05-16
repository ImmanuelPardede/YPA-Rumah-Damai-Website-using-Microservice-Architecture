package controller

import (
	"net/http"
	"strconv"

	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Golongan_Darah/dto"
	"github.com/iqbalsiagian17/Service_Golongan_Darah/helper"
	"github.com/iqbalsiagian17/Service_Golongan_Darah/model"
	"github.com/iqbalsiagian17/Service_Golongan_Darah/service"
)

// GolonganDarahController is a contract about something that this controller can do
type GolonganDarahController interface {
	All(ctx *gin.Context)
	FindByID(ctx *gin.Context)
	Insert(ctx *gin.Context)
	Update(ctx *gin.Context)
	Delete(ctx *gin.Context)
}

type golonganDarahController struct {
	GolonganDarahService service.GolonganDarahService
}

// NewGolonganDarahController creates a new instance of GolonganDarahController
func NewGolonganDarahController(GolonganDarahService service.GolonganDarahService) GolonganDarahController {
	return &golonganDarahController{
		GolonganDarahService: GolonganDarahService,
	}
}

func (c *golonganDarahController) All(ctx *gin.Context) {
	golonganDarahs := c.GolonganDarahService.All()
	ctx.JSON(http.StatusOK, golonganDarahs)
}

func (c *golonganDarahController) FindByID(ctx *gin.Context) {
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}

	golonganDarah := c.GolonganDarahService.FindByID(id)
	if golonganDarah.ID == 0 {
		res := helper.BuildErrorResponse("Data not found", "No data with given ID", helper.EmptyObj{})
		ctx.JSON(http.StatusNotFound, res)
		return
	}

	ctx.JSON(http.StatusOK, golonganDarah)
}

func (c *golonganDarahController) Insert(ctx *gin.Context) {
	var golonganDarahCreateDTO dto.GolonganDarahCreateDTO
	errDTO := ctx.ShouldBind(&golonganDarahCreateDTO)
	if errDTO != nil {
		res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	result := c.GolonganDarahService.Insert(golonganDarahCreateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusCreated, response)
}

func (c *golonganDarahController) Update(ctx *gin.Context) {
	var golonganDarahUpdateDTO dto.GolonganDarahUpdateDTO
	errDTO := ctx.ShouldBind(&golonganDarahUpdateDTO)
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
	golonganDarahUpdateDTO.ID = uint(id) // Convert id to uint
	result := c.GolonganDarahService.Update(golonganDarahUpdateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusOK, response)
}

func (c *golonganDarahController) Delete(ctx *gin.Context) {
	var golonganDarah model.GolonganDarah
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	golonganDarah.ID = uint(id)
	c.GolonganDarahService.Delete(golonganDarah)
	res := helper.BuildResponse(true, "Deleted", helper.EmptyObj{})
	ctx.JSON(http.StatusOK, res)
}
