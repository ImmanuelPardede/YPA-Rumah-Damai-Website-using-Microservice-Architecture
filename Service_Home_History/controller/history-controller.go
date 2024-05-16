package controller

import (
	"net/http"
	"strconv"

	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Visitor_History/dto"
	"github.com/iqbalsiagian17/Service_Visitor_History/helper"
	"github.com/iqbalsiagian17/Service_Visitor_History/model"
	"github.com/iqbalsiagian17/Service_Visitor_History/service"
)

// PromotedController is a contract about something that this controller can do
type HistoryController interface {
	All(ctx *gin.Context)
	FindByID(ctx *gin.Context)
	Insert(ctx *gin.Context)
	Update(ctx *gin.Context)
	Delete(ctx *gin.Context)
}

type historyController struct {
	HistoryService service.HistoryService
}

// NewHistoryController creates a new instance of HistoryController
func NewHistoryController(HistoryService service.HistoryService) HistoryController {
	return &historyController{
		HistoryService: HistoryService,
	}
}

func (c *historyController) All(ctx *gin.Context) {
	historys := c.HistoryService.All()
	ctx.JSON(http.StatusOK, historys)
}

func (c *historyController) FindByID(ctx *gin.Context) {
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}

	history := c.HistoryService.FindByID(id)
	if history.ID == 0 {
		res := helper.BuildErrorResponse("Data not found", "No data with given ID", helper.EmptyObj{})
		ctx.JSON(http.StatusNotFound, res)
		return
	}

	ctx.JSON(http.StatusOK, history)
}

func (c *historyController) Insert(ctx *gin.Context) {
	var historyCreateDTO dto.HistoryCreateDTO
	errDTO := ctx.ShouldBind(&historyCreateDTO)
	if errDTO != nil {
		res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	result := c.HistoryService.Insert(historyCreateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusCreated, response)
}

func (c *historyController) Update(ctx *gin.Context) {
	var historyUpdateDTO dto.HistoryUpdateDTO
	errDTO := ctx.ShouldBind(&historyUpdateDTO)
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
	historyUpdateDTO.ID = uint(id) // Convert id to uint
	result := c.HistoryService.Update(historyUpdateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusOK, response)
}

func (c *historyController) Delete(ctx *gin.Context) {
	var history model.History
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	history.ID = uint(id)
	c.HistoryService.Delete(history)
	res := helper.BuildResponse(true, "Deleted", helper.EmptyObj{})
	ctx.JSON(http.StatusOK, res)
}
