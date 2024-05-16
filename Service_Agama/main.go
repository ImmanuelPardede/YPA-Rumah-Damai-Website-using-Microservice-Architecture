package main

import (
	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Agama/config"
	"github.com/iqbalsiagian17/Service_Agama/controller"
	"github.com/iqbalsiagian17/Service_Agama/repository"
	"github.com/iqbalsiagian17/Service_Agama/service"
	"gorm.io/gorm"
)

var (
	db              *gorm.DB                   = config.SetupDatabaseConnection()
	agamaRepository repository.AgamaRepository = repository.NewAgamaRepository(db)
	AgamaService    service.AgamaService       = service.NewAgamaService(agamaRepository)
	agamaController controller.AgamaController = controller.NewAgamaController(AgamaService)
)

func main() {
	defer config.CloseDatabaseConnection(db)
	r := gin.Default()

	agamaRoutes := r.Group("/api/agama")
	{
		agamaRoutes.GET("/", agamaController.All)
		agamaRoutes.POST("/", agamaController.Insert)
		agamaRoutes.GET("/:id", agamaController.FindByID)
		agamaRoutes.PUT("/:id", agamaController.Update)
		agamaRoutes.DELETE("/:id", agamaController.Delete)
	}
	r.Run(":2222")
}
