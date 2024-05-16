package controller

import (
	"encoding/json"
	"fmt"
	"net/http"
	"strconv"

	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_News/dto"
	"github.com/iqbalsiagian17/Service_News/helper"
	"github.com/iqbalsiagian17/Service_News/model"
	"github.com/iqbalsiagian17/Service_News/service"
)

// CategoryController is a contract about something that this controller can do
type NewsController interface {
	All(ctx *gin.Context)
	FindByID(ctx *gin.Context)
	Insert(ctx *gin.Context)
	Update(ctx *gin.Context)
	Delete(ctx *gin.Context)
}

// CategoryService is a contract about something that this service can do
type CategoryService interface {
	GetCategoryID(id uint64) (uint64, error)
}

type categoryService struct{}

// NewCategoryService creates a new instance of CategoryService
func NewCategoryService() CategoryService {
	return &categoryService{}
}

type newsController struct {
	newsService     service.NewsService
	categoryService CategoryService
}

// NewnewsController creates a new instance of newsController
func NewNewsController(NewsService service.NewsService, CategoryService CategoryService) NewsController {
	return &newsController{
		newsService:     NewsService,
		categoryService: CategoryService,
	}
}

func (c *newsController) All(ctx *gin.Context) {
	newes := c.newsService.All()
	ctx.JSON(http.StatusOK, newes)
}

func (c *newsController) FindByID(ctx *gin.Context) {
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}

	news := c.newsService.FindByID(id)
	if news.ID == 0 {
		res := helper.BuildErrorResponse("Data not found", "No data with given ID", helper.EmptyObj{})
		ctx.JSON(http.StatusNotFound, res)
		return
	}

	ctx.JSON(http.StatusOK, news)
}

func (c *newsController) Insert(ctx *gin.Context) {
	var newsCreateDTO dto.NewsCreateDTO
	errDTO := ctx.ShouldBind(&newsCreateDTO)
	if errDTO != nil {
		res := helper.BuildErrorResponse("Failed to process request", errDTO.Error(), helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}

	// Mendapatkan ID kategori dari layanan kategori
	categoryID, err := c.categoryService.GetCategoryID(uint64(newsCreateDTO.CategoryID))
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get category ID", err.Error(), helper.EmptyObj{})
		ctx.JSON(http.StatusInternalServerError, res)
		return
	}

	// Menambahkan ID kategori ke dalam newsCreateDTO
	newsCreateDTO.CategoryID = uint(categoryID)

	result := c.newsService.Insert(newsCreateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusCreated, response)
}

func (c *newsController) Update(ctx *gin.Context) {
	var newsUpdateDTO dto.NewsUpdateDTO
	errDTO := ctx.ShouldBind(&newsUpdateDTO)
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
	newsUpdateDTO.ID = uint(id) // Convert id to uint

	// Mendapatkan ID kategori dari layanan kategori
	categoryID, err := c.categoryService.GetCategoryID(uint64(newsUpdateDTO.CategoryID))
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get category ID", err.Error(), helper.EmptyObj{})
		ctx.JSON(http.StatusInternalServerError, res)
		return
	}

	// Menambahkan ID kategori ke dalam newsUpdateDTO
	newsUpdateDTO.CategoryID = uint(categoryID)

	result := c.newsService.Update(newsUpdateDTO)
	response := helper.BuildResponse(true, "OK!", result)
	ctx.JSON(http.StatusOK, response)
}

func (c *newsController) Delete(ctx *gin.Context) {
	var news model.News
	idStr := ctx.Param("id")
	id, err := strconv.ParseUint(idStr, 10, 64)
	if err != nil {
		res := helper.BuildErrorResponse("Failed to get ID", "No param ID were found", helper.EmptyObj{})
		ctx.JSON(http.StatusBadRequest, res)
		return
	}
	news.ID = uint(id)
	c.newsService.Delete(news)
	res := helper.BuildResponse(true, "Deleted", helper.EmptyObj{})
	ctx.JSON(http.StatusOK, res)
}

func (cs *categoryService) GetCategoryID(id uint64) (uint64, error) {
	// Panggil API kategori untuk mendapatkan informasi kategori berdasarkan ID
	url := fmt.Sprintf("http://localhost:7777/api/category/%d", id)

	resp, err := http.Get(url)
	if err != nil {
		return 0, err
	}
	defer resp.Body.Close()

	if resp.StatusCode != http.StatusOK {
		return 0, fmt.Errorf("failed to fetch Category ID: %s", resp.Status)
	}

	var kategori struct {
		ID uint64 `json:"id"`
	}
	if err := json.NewDecoder(resp.Body).Decode(&kategori); err != nil {
		return 0, err
	}

	return kategori.ID, nil
}
