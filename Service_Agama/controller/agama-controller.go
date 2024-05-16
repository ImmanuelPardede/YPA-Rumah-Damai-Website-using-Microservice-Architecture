package controller

import (
	"net/http"
	"strconv"

	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Agama/dto"
	"github.com/iqbalsiagian17/Service_Agama/helper"
	"github.com/iqbalsiagian17/Service_Agama/model"
	"github.com/iqbalsiagian17/Service_Agama/service"
)

// AgamaController is a contract about something that this controller can do
type AgamaController interface {
	All(ctx *gin.Context)
	FindByID(ctx *gin.Context)
	Insert(ctx *gin.Context)
	Update(ctx *gin.Context)
	Delete(ctx *gin.Context)
}

type agamaController struct {
	AgamaService service.AgamaService
}

// NewAgamaController creates a new instance of AgamaController
func NewAgamaController(AgamaService service.AgamaService) AgamaController {
	return &agamaController{
		AgamaService: AgamaService,
	}
}

func (c *agamaController) All(ctx *gin.Context) {
	agamas := c.AgamaService.All()
	ctx.JSON(http.StatusOK, agamas)
}

func (c *agamaController) FindByID(ctx *gin.Context) {
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}

	agama := c.AgamaService.FindByID(id)
	if agama.ID == 0 {
		res := helper.BuildErrorResponse("Data not found", "No data with given ID", helper.EmptyObj{})
		ctx.JSON(http.StatusNotFound, res)
		return
	}

	ctx.JSON(http.StatusOK, agama)
}

func (c *agamaController) Insert(ctx *gin.Context) {
	var agamaCreateDTO dto.AgamaCreateDTO
	errDTO := ctx.ShouldBind(&agamaCreateDTO)
	if errDTO != nil {
		res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	result := c.AgamaService.Insert(agamaCreateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusCreated, response)
}

func (c *agamaController) Update(ctx *gin.Context) {
	var agamaUpdateDTO dto.AgamaUpdateDTO
	errDTO := ctx.ShouldBind(&agamaUpdateDTO)
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
	agamaUpdateDTO.ID = uint(id) // Convert id to uint
	result := c.AgamaService.Update(agamaUpdateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusOK, response)
}

func (c *agamaController) Delete(ctx *gin.Context) {
	var agama model.Agama
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	agama.ID = uint(id)
	c.AgamaService.Delete(agama)
	res := helper.BuildResponse(true, "Deleted", helper.EmptyObj{})
	ctx.JSON(http.StatusOK, res)
}
