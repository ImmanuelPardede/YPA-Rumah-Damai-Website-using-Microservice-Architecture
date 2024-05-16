package controller

import (
	"net/http"
	"strconv"

	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Jenis_Sponsorship/dto"
	"github.com/iqbalsiagian17/Service_Jenis_Sponsorship/helper"
	"github.com/iqbalsiagian17/Service_Jenis_Sponsorship/model"
	"github.com/iqbalsiagian17/Service_Jenis_Sponsorship/service"
)

// JenisSponsorshipController is a contract about something that this controller can do
type JenisSponsorshipController interface {
	All(ctx *gin.Context)
	FindByID(ctx *gin.Context)
	Insert(ctx *gin.Context)
	Update(ctx *gin.Context)
	Delete(ctx *gin.Context)
}

type jenisSponsorshipController struct {
	JenisSponsorshipService service.JenisSponsorshipService
}

// NewJenisSponsorshipController creates a new instance of JenisSponsorshipController
func NewJenisSponsorshipController(JenisSponsorshipService service.JenisSponsorshipService) JenisSponsorshipController {
	return &jenisSponsorshipController{
		JenisSponsorshipService: JenisSponsorshipService,
	}
}

func (c *jenisSponsorshipController) All(ctx *gin.Context) {
	jenisSponsorships := c.JenisSponsorshipService.GetAll()
	ctx.JSON(http.StatusOK, jenisSponsorships)
}

func (c *jenisSponsorshipController) FindByID(ctx *gin.Context) {
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}

	jenisSponsorship := c.JenisSponsorshipService.GetByID(id)
	if jenisSponsorship.ID == 0 {
		res := helper.BuildErrorResponse("Data not found", "No data with given ID", helper.EmptyObj{})
		ctx.JSON(http.StatusNotFound, res)
		return
	}

	ctx.JSON(http.StatusOK, jenisSponsorship)
}

func (c *jenisSponsorshipController) Insert(ctx *gin.Context) {
	var jenisSponsorshipCreateDTO dto.JenisSponsorshipCreateDTO
	errDTO := ctx.ShouldBind(&jenisSponsorshipCreateDTO)
	if errDTO != nil {
		res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	result := c.JenisSponsorshipService.Create(jenisSponsorshipCreateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusCreated, response)
}

func (c *jenisSponsorshipController) Update(ctx *gin.Context) {
	var jenisSponsorshipUpdateDTO dto.JenisSponsorshipUpdateDTO
	errDTO := ctx.ShouldBind(&jenisSponsorshipUpdateDTO)
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
	jenisSponsorshipUpdateDTO.ID = uint(id) // Convert id to uint
	result := c.JenisSponsorshipService.Update(jenisSponsorshipUpdateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusOK, response)
}

func (c *jenisSponsorshipController) Delete(ctx *gin.Context) {
	var jenisSponsorship model.JenisSponsorship
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	jenisSponsorship.ID = uint(id)
	c.JenisSponsorshipService.Delete(jenisSponsorship)
	res := helper.BuildResponse(true, "Deleted", helper.EmptyObj{})
	ctx.JSON(http.StatusOK, res)
}
