package controller

import (
	"net/http"
	"strconv"

	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Jenis_Disabilitas/dto"
	"github.com/iqbalsiagian17/Service_Jenis_Disabilitas/helper"
	"github.com/iqbalsiagian17/Service_Jenis_Disabilitas/model"
	"github.com/iqbalsiagian17/Service_Jenis_Disabilitas/service"
)

// JenisDisabilitasController is a contract about something that this controller can do
type JenisDisabilitasController interface {
	All(ctx *gin.Context)
	FindByID(ctx *gin.Context)
	Insert(ctx *gin.Context)
	Update(ctx *gin.Context)
	Delete(ctx *gin.Context)
}

type jenisDisabilitasController struct {
	JenisDisabilitasService service.JenisDisabilitasService
}

// NewJenisDisabilitasController creates a new instance of JenisDisabilitasController
func NewJenisDisabilitasController(JenisDisabilitasService service.JenisDisabilitasService) JenisDisabilitasController {
	return &jenisDisabilitasController{
		JenisDisabilitasService: JenisDisabilitasService,
	}
}

func (c *jenisDisabilitasController) All(ctx *gin.Context) {
	jenisDisabilitas := c.JenisDisabilitasService.All()
	ctx.JSON(http.StatusOK, jenisDisabilitas)
}

func (c *jenisDisabilitasController) FindByID(ctx *gin.Context) {
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}

	jenisDisabilitas := c.JenisDisabilitasService.FindByID(id)
	if jenisDisabilitas.ID == 0 {
		res := helper.BuildErrorResponse("Data not found", "No data with given ID", helper.EmptyObj{})
		ctx.JSON(http.StatusNotFound, res)
		return
	}

	ctx.JSON(http.StatusOK, jenisDisabilitas)
}

func (c *jenisDisabilitasController) Insert(ctx *gin.Context) {
	var jenisDisabilitasCreateDTO dto.JenisDisabilitasCreateDTO
	errDTO := ctx.ShouldBind(&jenisDisabilitasCreateDTO)
	if errDTO != nil {
		res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	result := c.JenisDisabilitasService.Insert(jenisDisabilitasCreateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusCreated, response)
}

func (c *jenisDisabilitasController) Update(ctx *gin.Context) {
	var jenisDisabilitasUpdateDTO dto.JenisDisabilitasUpdateDTO
	errDTO := ctx.ShouldBind(&jenisDisabilitasUpdateDTO)
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
	jenisDisabilitasUpdateDTO.ID = uint(id) // Convert id to uint
	result := c.JenisDisabilitasService.Update(jenisDisabilitasUpdateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusOK, response)
}

func (c *jenisDisabilitasController) Delete(ctx *gin.Context) {
	var jenisDisabilitas model.JenisDisabilitas
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	jenisDisabilitas.ID = uint(id)
	c.JenisDisabilitasService.Delete(jenisDisabilitas)
	res := helper.BuildResponse(true, "Deleted", helper.EmptyObj{})
	ctx.JSON(http.StatusOK, res)
}
