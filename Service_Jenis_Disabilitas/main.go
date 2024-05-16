package main

import (
	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Jenis_Disabilitas/config"
	"github.com/iqbalsiagian17/Service_Jenis_Disabilitas/controller"
	"github.com/iqbalsiagian17/Service_Jenis_Disabilitas/repository"
	"github.com/iqbalsiagian17/Service_Jenis_Disabilitas/service"
	"gorm.io/gorm"
)

var (
	db                         *gorm.DB                              = config.SetupDatabaseConnection()
	jenisDisabilitasRepository repository.JenisDisabilitasRepository = repository.NewJenisDisabilitasRepository(db)
	JenisDisabilitasService    service.JenisDisabilitasService       = service.NewJenisDisabilitasService(jenisDisabilitasRepository)
	jenisDisabilitasController controller.JenisDisabilitasController = controller.NewJenisDisabilitasController(JenisDisabilitasService)
)

func main() {
	defer config.CloseDatabaseConnection(db)
	r := gin.Default()

	jenisDisabilitasRoutes := r.Group("/api/jenis_disabilitas")
	{
		jenisDisabilitasRoutes.GET("/", jenisDisabilitasController.All)
		jenisDisabilitasRoutes.POST("/", jenisDisabilitasController.Insert)
		jenisDisabilitasRoutes.GET("/:id", jenisDisabilitasController.FindByID)
		jenisDisabilitasRoutes.PUT("/:id", jenisDisabilitasController.Update)
		jenisDisabilitasRoutes.DELETE("/:id", jenisDisabilitasController.Delete)
	}
	r.Run(":1110")
}
