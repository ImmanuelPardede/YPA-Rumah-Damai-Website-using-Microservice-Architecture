package main

import (
	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_News/config"
	"github.com/iqbalsiagian17/Service_News/controller"
	"github.com/iqbalsiagian17/Service_News/repository"
	"github.com/iqbalsiagian17/Service_News/service"
	"gorm.io/gorm"
)

var (
	db              *gorm.DB                  = config.SetupDatabaseConnection()
	newsRepository  repository.NewsRepository = repository.NewNewsRepository(db)
	NewsService     service.NewsService       = service.NewNewsService(newsRepository)
	categoryService service.CategoryService   = service.NewCategoryService()
	newsController  controller.NewsController = controller.NewNewsController(NewsService, categoryService)
)

// membuat variable db dengan nilai setup database connection
func main() {
	defer config.CloseDatabaseConnection(db)
	r := gin.Default()

	newsRoutes := r.Group("/api/news")
	{
		newsRoutes.GET("/", newsController.All)
		newsRoutes.POST("/", newsController.Insert)
		newsRoutes.GET("/:id", newsController.FindByID)
		newsRoutes.PUT("/:id", newsController.Update)
		newsRoutes.DELETE("/:id", newsController.Delete)
	}
	r.Run(":9004")
}
