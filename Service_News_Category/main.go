package main

import (
	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_News_Category/config"
	"github.com/iqbalsiagian17/Service_News_Category/controller"
	"github.com/iqbalsiagian17/Service_News_Category/repository"
	"github.com/iqbalsiagian17/Service_News_Category/service"
	"gorm.io/gorm"
)

var (
	db                 *gorm.DB                      = config.SetupDatabaseConnection()
	categoryRepository repository.CategoryRepository = repository.NewCategoryRepository(db)
	CategoryService    service.CategoryService       = service.NewCategoryService(categoryRepository)
	categoryController controller.CategoryController = controller.NewCategoryController(CategoryService)
)

// membuat variable db dengan nilai setup database connection
func main() {
	defer config.CloseDatabaseConnection(db)
	r := gin.Default()

	categoryRoutes := r.Group("/api/category")
	{
		categoryRoutes.GET("/", categoryController.All)
		categoryRoutes.POST("/", categoryController.Insert)
		categoryRoutes.GET("/:id", categoryController.FindByID)
		categoryRoutes.PUT("/:id", categoryController.Update)
		categoryRoutes.DELETE("/:id", categoryController.Delete)
	}
	r.Run(":9003")
}
