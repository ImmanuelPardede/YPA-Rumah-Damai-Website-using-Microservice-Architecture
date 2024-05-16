package controller

import (
	"net/http"
	"strconv"

	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Tahun_Kurikulum/dto"
	"github.com/iqbalsiagian17/Service_Tahun_Kurikulum/helper"
	"github.com/iqbalsiagian17/Service_Tahun_Kurikulum/model"
	"github.com/iqbalsiagian17/Service_Tahun_Kurikulum/service"
)

// TahunKurikulumController is a contract about something that this controller can do
type TahunKurikulumController interface {
	All(ctx *gin.Context)
	FindByID(ctx *gin.Context)
	Insert(ctx *gin.Context)
	Update(ctx *gin.Context)
	Delete(ctx *gin.Context)
}

type tahunKurikulumController struct {
	TahunKurikulumService service.TahunKurikulumService
}

// NewTahunKurikulumController creates a new instance of TahunKurikulumController
func NewTahunKurikulumController(TahunKurikulumService service.TahunKurikulumService) TahunKurikulumController {
	return &tahunKurikulumController{
		TahunKurikulumService: TahunKurikulumService,
	}
}

func (c *tahunKurikulumController) All(ctx *gin.Context) {
	tahunKurikulums := c.TahunKurikulumService.All()
	ctx.JSON(http.StatusOK, tahunKurikulums)
}

func (c *tahunKurikulumController) FindByID(ctx *gin.Context) {
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}

	tahunKurikulum := c.TahunKurikulumService.FindByID(id)
	if tahunKurikulum.ID == 0 {
		res := helper.BuildErrorResponse("Data not found", "No data with given ID", helper.EmptyObj{})
		ctx.JSON(http.StatusNotFound, res)
		return
	}

	ctx.JSON(http.StatusOK, tahunKurikulum)
}

func (c *tahunKurikulumController) Insert(ctx *gin.Context) {
	var tahunKurikulumCreateDTO dto.TahunKurikulumCreateDTO
	errDTO := ctx.ShouldBind(&tahunKurikulumCreateDTO)
	if errDTO != nil {
		res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	result := c.TahunKurikulumService.Insert(tahunKurikulumCreateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusCreated, response)
}

func (c *tahunKurikulumController) Update(ctx *gin.Context) {
	var tahunKurikulumUpdateDTO dto.TahunKurikulumUpdateDTO
	errDTO := ctx.ShouldBind(&tahunKurikulumUpdateDTO)
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
	tahunKurikulumUpdateDTO.ID = uint(id) // Convert id to uint
	result := c.TahunKurikulumService.Update(tahunKurikulumUpdateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusOK, response)
}

func (c *tahunKurikulumController) Delete(ctx *gin.Context) {
	var tahunKurikulum model.TahunKurikulum
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	tahunKurikulum.ID = uint(id)
	c.TahunKurikulumService.Delete(tahunKurikulum)
	res := helper.BuildResponse(true, "Deleted", helper.EmptyObj{})
	ctx.JSON(http.StatusOK, res)
}
