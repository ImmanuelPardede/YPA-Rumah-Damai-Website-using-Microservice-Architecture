package main

import (
	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Donasi/config"
	"github.com/iqbalsiagian17/Service_Donasi/controller"
	"github.com/iqbalsiagian17/Service_Donasi/repository"
	"github.com/iqbalsiagian17/Service_Donasi/service"
	"gorm.io/gorm"
)

var (
	db               *gorm.DB                    = config.SetupDatabaseConnection()
	donasiRepository repository.DonasiRepository = repository.NewDonasiRepository(db)
	DonasiService    service.DonasiService       = service.NewDonasiService(donasiRepository)
	donasiController controller.DonasiController = controller.NewDonasiController(DonasiService)
)

func main() {
	defer config.CloseDatabaseConnection(db)
	r := gin.Default()

	donasiRoutes := r.Group("/api/donasi")
	{
		donasiRoutes.GET("/", donasiController.All)
		donasiRoutes.POST("/", donasiController.Insert)
		donasiRoutes.GET("/:id", donasiController.FindByID)
		donasiRoutes.PUT("/:id", donasiController.Update)
		donasiRoutes.DELETE("/:id", donasiController.Delete)
	}
	r.Run(":4444")
}
