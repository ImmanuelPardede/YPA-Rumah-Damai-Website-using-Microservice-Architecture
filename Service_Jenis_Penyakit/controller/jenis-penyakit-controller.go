package controller

import (
	"net/http"
	"strconv"

	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Jenis_Penyakit/dto"
	"github.com/iqbalsiagian17/Service_Jenis_Penyakit/helper"
	"github.com/iqbalsiagian17/Service_Jenis_Penyakit/model"
	"github.com/iqbalsiagian17/Service_Jenis_Penyakit/service"
)

// JenisPenyakitController is a contract about something that this controller can do
type JenisPenyakitController interface {
	All(ctx *gin.Context)
	FindByID(ctx *gin.Context)
	Insert(ctx *gin.Context)
	Update(ctx *gin.Context)
	Delete(ctx *gin.Context)
}

type jenisPenyakitController struct {
	JenisPenyakitService service.JenisPenyakitService
}

// NewJenisPenyakitController creates a new instance of JenisPenyakitController
func NewJenisPenyakitController(JenisPenyakitService service.JenisPenyakitService) JenisPenyakitController {
	return &jenisPenyakitController{
		JenisPenyakitService: JenisPenyakitService,
	}
}

func (c *jenisPenyakitController) All(ctx *gin.Context) {
	jenisPenyakits := c.JenisPenyakitService.All()
	ctx.JSON(http.StatusOK, jenisPenyakits)
}

func (c *jenisPenyakitController) FindByID(ctx *gin.Context) {
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}

	jenisPenyakit := c.JenisPenyakitService.FindByID(id)
	if jenisPenyakit.ID == 0 {
		res := helper.BuildErrorResponse("Data not found", "No data with given ID", helper.EmptyObj{})
		ctx.JSON(http.StatusNotFound, res)
		return
	}

	ctx.JSON(http.StatusOK, jenisPenyakit)
}

func (c *jenisPenyakitController) Insert(ctx *gin.Context) {
	var jenisPenyakitCreateDTO dto.JenisPenyakitCreateDTO
	errDTO := ctx.ShouldBind(&jenisPenyakitCreateDTO)
	if errDTO != nil {
		res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	result := c.JenisPenyakitService.Insert(jenisPenyakitCreateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusCreated, response)
}

func (c *jenisPenyakitController) Update(ctx *gin.Context) {
	var jenisPenyakitUpdateDTO dto.JenisPenyakitUpdateDTO
	errDTO := ctx.ShouldBind(&jenisPenyakitUpdateDTO)
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
	jenisPenyakitUpdateDTO.ID = uint(id) // Convert id to uint
	result := c.JenisPenyakitService.Update(jenisPenyakitUpdateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusOK, response)
}

func (c *jenisPenyakitController) Delete(ctx *gin.Context) {
	var jenisPenyakit model.JenisPenyakit
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	jenisPenyakit.ID = uint(id)
	c.JenisPenyakitService.Delete(jenisPenyakit)
	res := helper.BuildResponse(true, "Deleted", helper.EmptyObj{})
	ctx.JSON(http.StatusOK, res)
}
