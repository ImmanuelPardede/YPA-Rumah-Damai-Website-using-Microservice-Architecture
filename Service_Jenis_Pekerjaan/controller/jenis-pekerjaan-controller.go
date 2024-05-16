package controller

import (
	"net/http"
	"strconv"

	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Jenis_Pekerjaan/dto"
	"github.com/iqbalsiagian17/Service_Jenis_Pekerjaan/helper"
	"github.com/iqbalsiagian17/Service_Jenis_Pekerjaan/model"
	"github.com/iqbalsiagian17/Service_Jenis_Pekerjaan/service"
)

// JenisPekerjaanController is a contract about something that this controller can do
type JenisPekerjaanController interface {
	All(ctx *gin.Context)
	FindByID(ctx *gin.Context)
	Insert(ctx *gin.Context)
	Update(ctx *gin.Context)
	Delete(ctx *gin.Context)
}

type jenisPekerjaanController struct {
	JenisPekerjaanService service.JenisPekerjaanService
}

// NewJenisPekerjaanController creates a new instance of JenisPekerjaanController
func NewJenisPekerjaanController(JenisPekerjaanService service.JenisPekerjaanService) JenisPekerjaanController {
	return &jenisPekerjaanController{
		JenisPekerjaanService: JenisPekerjaanService,
	}
}

func (c *jenisPekerjaanController) All(ctx *gin.Context) {
	jenisPekerjaans := c.JenisPekerjaanService.All()
	ctx.JSON(http.StatusOK, jenisPekerjaans)
}

func (c *jenisPekerjaanController) FindByID(ctx *gin.Context) {
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}

	jenisPekerjaan := c.JenisPekerjaanService.FindByID(id)
	if jenisPekerjaan.ID == 0 {
		res := helper.BuildErrorResponse("Data not found", "No data with given ID", helper.EmptyObj{})
		ctx.JSON(http.StatusNotFound, res)
		return
	}

	ctx.JSON(http.StatusOK, jenisPekerjaan)
}

func (c *jenisPekerjaanController) Insert(ctx *gin.Context) {
	var jenisPekerjaanCreateDTO dto.JenisPekerjaanCreateDTO
	errDTO := ctx.ShouldBind(&jenisPekerjaanCreateDTO)
	if errDTO != nil {
		res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	result := c.JenisPekerjaanService.Insert(jenisPekerjaanCreateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusCreated, response)
}

func (c *jenisPekerjaanController) Update(ctx *gin.Context) {
	var jenisPekerjaanUpdateDTO dto.JenisPekerjaanUpdateDTO
	errDTO := ctx.ShouldBind(&jenisPekerjaanUpdateDTO)
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
	jenisPekerjaanUpdateDTO.ID = uint(id) // Convert id to uint
	result := c.JenisPekerjaanService.Update(jenisPekerjaanUpdateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusOK, response)
}

func (c *jenisPekerjaanController) Delete(ctx *gin.Context) {
	var jenisPekerjaan model.JenisPekerjaan
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	jenisPekerjaan.ID = uint(id)
	c.JenisPekerjaanService.Delete(jenisPekerjaan)
	res := helper.BuildResponse(true, "Deleted", helper.EmptyObj{})
	ctx.JSON(http.StatusOK, res)
}
