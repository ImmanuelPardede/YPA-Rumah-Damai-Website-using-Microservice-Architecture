package main

import (
	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Tahun_Ajaran/config"
	"github.com/iqbalsiagian17/Service_Tahun_Ajaran/controller"
	"github.com/iqbalsiagian17/Service_Tahun_Ajaran/repository"
	"github.com/iqbalsiagian17/Service_Tahun_Ajaran/service"
	"gorm.io/gorm"
)

var (
	db                    *gorm.DB                         = config.SetupDatabaseConnection()
	tahunAjaranRepository repository.TahunAjaranRepository = repository.NewTahunAjaranRepository(db)
	TahunAjaranService    service.TahunAjaranService       = service.NewTahunAjaranService(tahunAjaranRepository)
	tahunAjaranController controller.TahunAjaranController = controller.NewTahunAjaranController(TahunAjaranService)
)

func main() {
	defer config.CloseDatabaseConnection(db)
	r := gin.Default()

	tahunAjaranRoutes := r.Group("/api/tahun_ajaran")
	{
		tahunAjaranRoutes.GET("/", tahunAjaranController.All)
		tahunAjaranRoutes.POST("/", tahunAjaranController.Insert)
		tahunAjaranRoutes.GET("/:id", tahunAjaranController.FindByID)
		tahunAjaranRoutes.PUT("/:id", tahunAjaranController.Update)
		tahunAjaranRoutes.DELETE("/:id", tahunAjaranController.Delete)
	}
	r.Run(":7770")
}
