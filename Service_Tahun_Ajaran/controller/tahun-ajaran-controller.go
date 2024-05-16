package controller

import (
	"net/http"
	"strconv"

	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Tahun_Ajaran/dto"
	"github.com/iqbalsiagian17/Service_Tahun_Ajaran/helper"
	"github.com/iqbalsiagian17/Service_Tahun_Ajaran/model"
	"github.com/iqbalsiagian17/Service_Tahun_Ajaran/service"
)

// TahunAjaranController is a contract about something that this controller can do
type TahunAjaranController interface {
	All(ctx *gin.Context)
	FindByID(ctx *gin.Context)
	Insert(ctx *gin.Context)
	Update(ctx *gin.Context)
	Delete(ctx *gin.Context)
}

type tahunAjaranController struct {
	TahunAjaranService service.TahunAjaranService
}

// NewTahunAjaranController creates a new instance of TahunAjaranController
func NewTahunAjaranController(TahunAjaranService service.TahunAjaranService) TahunAjaranController {
	return &tahunAjaranController{
		TahunAjaranService: TahunAjaranService,
	}
}

func (c *tahunAjaranController) All(ctx *gin.Context) {
	tahunAjarans := c.TahunAjaranService.All()
	ctx.JSON(http.StatusOK, tahunAjarans)
}

func (c *tahunAjaranController) FindByID(ctx *gin.Context) {
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}

	tahunAjaran := c.TahunAjaranService.FindByID(id)
	if tahunAjaran.ID == 0 {
		res := helper.BuildErrorResponse("Data not found", "No data with given ID", helper.EmptyObj{})
		ctx.JSON(http.StatusNotFound, res)
		return
	}

	ctx.JSON(http.StatusOK, tahunAjaran)
}

func (c *tahunAjaranController) Insert(ctx *gin.Context) {
	var tahunAjaranCreateDTO dto.TahunAjaranCreateDTO
	errDTO := ctx.ShouldBind(&tahunAjaranCreateDTO)
	if errDTO != nil {
		res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	result := c.TahunAjaranService.Insert(tahunAjaranCreateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusCreated, response)
}

func (c *tahunAjaranController) Update(ctx *gin.Context) {
	var tahunAjaranUpdateDTO dto.TahunAjaranUpdateDTO
	errDTO := ctx.ShouldBind(&tahunAjaranUpdateDTO)
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
	tahunAjaranUpdateDTO.ID = uint(id) // Convert id to uint
	result := c.TahunAjaranService.Update(tahunAjaranUpdateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusOK, response)
}

func (c *tahunAjaranController) Delete(ctx *gin.Context) {
	var tahunAjaran model.TahunAjaran
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	tahunAjaran.ID = uint(id)
	c.TahunAjaranService.Delete(tahunAjaran)
	res := helper.BuildResponse(true, "Deleted", helper.EmptyObj{})
	ctx.JSON(http.StatusOK, res)
}
