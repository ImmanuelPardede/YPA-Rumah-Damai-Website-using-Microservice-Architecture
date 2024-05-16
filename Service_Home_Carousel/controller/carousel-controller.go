package controller

import (
	"net/http"
	"strconv"

	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Visitor_Carousel/dto"
	"github.com/iqbalsiagian17/Service_Visitor_Carousel/helper"
	"github.com/iqbalsiagian17/Service_Visitor_Carousel/model"
	"github.com/iqbalsiagian17/Service_Visitor_Carousel/service"
)

// PromotedController is a contract about something that this controller can do
type CarouselController interface {
	All(ctx *gin.Context)
	FindByID(ctx *gin.Context)
	Insert(ctx *gin.Context)
	Update(ctx *gin.Context)
	Delete(ctx *gin.Context)
}

type carouselController struct {
	CarouselService service.CarouselService
}

// NewCarouselController creates a new instance of CarouselController
func NewCarouselController(CarouselService service.CarouselService) CarouselController {
	return &carouselController{
		CarouselService: CarouselService,
	}
}

func (c *carouselController) All(ctx *gin.Context) {
	carousels := c.CarouselService.All()
	ctx.JSON(http.StatusOK, carousels)
}

func (c *carouselController) FindByID(ctx *gin.Context) {
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}

	carousel := c.CarouselService.FindByID(id)
	if carousel.ID == 0 {
		res := helper.BuildErrorResponse("Data not found", "No data with given ID", helper.EmptyObj{})
		ctx.JSON(http.StatusNotFound, res)
		return
	}

	ctx.JSON(http.StatusOK, carousel)
}

func (c *carouselController) Insert(ctx *gin.Context) {
	var carouselCreateDTO dto.CarouselCreateDTO
	errDTO := ctx.ShouldBind(&carouselCreateDTO)
	if errDTO != nil {
		res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	result := c.CarouselService.Insert(carouselCreateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusCreated, response)
}

func (c *carouselController) Update(ctx *gin.Context) {
	var carouselUpdateDTO dto.CarouselUpdateDTO
	errDTO := ctx.ShouldBind(&carouselUpdateDTO)
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
	carouselUpdateDTO.ID = uint(id) // Convert id to uint
	result := c.CarouselService.Update(carouselUpdateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusOK, response)
}

func (c *carouselController) Delete(ctx *gin.Context) {
	var carousel model.Carousel
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	carousel.ID = uint(id)
	c.CarouselService.Delete(carousel)
	res := helper.BuildResponse(true, "Deleted", helper.EmptyObj{})
	ctx.JSON(http.StatusOK, res)
}
