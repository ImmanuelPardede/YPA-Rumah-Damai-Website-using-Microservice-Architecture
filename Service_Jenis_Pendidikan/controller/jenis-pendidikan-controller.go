package controller

import (
	"net/http"
	"strconv"

	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Jenis_Pendidikan/dto"
	"github.com/iqbalsiagian17/Service_Jenis_Pendidikan/helper"
	"github.com/iqbalsiagian17/Service_Jenis_Pendidikan/model"
	"github.com/iqbalsiagian17/Service_Jenis_Pendidikan/service"
)

// JenisPendidikanController is a contract about something that this controller can do
type JenisPendidikanController interface {
	All(ctx *gin.Context)
	FindByID(ctx *gin.Context)
	Insert(ctx *gin.Context)
	Update(ctx *gin.Context)
	Delete(ctx *gin.Context)
}

type jenisPendidikanController struct {
	JenisPendidikanService service.JenisPendidikanService
}

// NewJenisPendidikanController creates a new instance of JenisPendidikanController
func NewJenisPendidikanController(JenisPendidikanService service.JenisPendidikanService) JenisPendidikanController {
	return &jenisPendidikanController{
		JenisPendidikanService: JenisPendidikanService,
	}
}

func (c *jenisPendidikanController) All(ctx *gin.Context) {
	jenisPendidikans := c.JenisPendidikanService.All()
	ctx.JSON(http.StatusOK, jenisPendidikans)
}

func (c *jenisPendidikanController) FindByID(ctx *gin.Context) {
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}

	jenisPendidikan := c.JenisPendidikanService.FindByID(id)
	if jenisPendidikan.ID == 0 {
		res := helper.BuildErrorResponse("Data not found", "No data with given ID", helper.EmptyObj{})
		ctx.JSON(http.StatusNotFound, res)
		return
	}

	ctx.JSON(http.StatusOK, jenisPendidikan)
}

func (c *jenisPendidikanController) Insert(ctx *gin.Context) {
	var jenisPendidikanCreateDTO dto.JenisPendidikanCreateDTO
	errDTO := ctx.ShouldBind(&jenisPendidikanCreateDTO)
	if errDTO != nil {
		res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	result := c.JenisPendidikanService.Insert(jenisPendidikanCreateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusCreated, response)
}

func (c *jenisPendidikanController) Update(ctx *gin.Context) {
	var jenisPendidikanUpdateDTO dto.JenisPendidikanUpdateDTO
	errDTO := ctx.ShouldBind(&jenisPendidikanUpdateDTO)
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
	jenisPendidikanUpdateDTO.ID = uint(id) // Convert id to uint
	result := c.JenisPendidikanService.Update(jenisPendidikanUpdateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusOK, response)
}

func (c *jenisPendidikanController) Delete(ctx *gin.Context) {
	var jenisPendidikan model.JenisPendidikan
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	jenisPendidikan.ID = uint(id)
	c.JenisPendidikanService.Delete(jenisPendidikan)
	res := helper.BuildResponse(true, "Deleted", helper.EmptyObj{})
	ctx.JSON(http.StatusOK, res)
}
