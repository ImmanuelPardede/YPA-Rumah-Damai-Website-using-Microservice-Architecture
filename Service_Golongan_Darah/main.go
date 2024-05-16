package main

import (
	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Golongan_Darah/config"
	"github.com/iqbalsiagian17/Service_Golongan_Darah/controller"
	"github.com/iqbalsiagian17/Service_Golongan_Darah/repository"
	"github.com/iqbalsiagian17/Service_Golongan_Darah/service"
	"gorm.io/gorm"
)

var (
	db                      *gorm.DB                           = config.SetupDatabaseConnection()
	golonganDarahRepository repository.GolonganDarahRepository = repository.NewGolonganDarahRepository(db)
	GolonganDarahService    service.GolonganDarahService       = service.NewGolonganDarahService(golonganDarahRepository)
	golonganDarahController controller.GolonganDarahController = controller.NewGolonganDarahController(GolonganDarahService)
)

func main() {
	defer config.CloseDatabaseConnection(db)
	r := gin.Default()

	golonganDarahRoutes := r.Group("/api/golongan_darah")
	{
		golonganDarahRoutes.GET("/", golonganDarahController.All)
		golonganDarahRoutes.POST("/", golonganDarahController.Insert)
		golonganDarahRoutes.GET("/:id", golonganDarahController.FindByID)
		golonganDarahRoutes.PUT("/:id", golonganDarahController.Update)
		golonganDarahRoutes.DELETE("/:id", golonganDarahController.Delete)
	}
	r.Run(":9999")
}
