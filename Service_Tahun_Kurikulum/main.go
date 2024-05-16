package main

import (
	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Tahun_Kurikulum/config"
	"github.com/iqbalsiagian17/Service_Tahun_Kurikulum/controller"
	"github.com/iqbalsiagian17/Service_Tahun_Kurikulum/repository"
	"github.com/iqbalsiagian17/Service_Tahun_Kurikulum/service"
	"gorm.io/gorm"
)

var (
	db                       *gorm.DB                            = config.SetupDatabaseConnection()
	tahunKurikulumRepository repository.TahunKurikulumRepository = repository.NewTahunKurikulumRepository(db)
	TahunKurikulumService    service.TahunKurikulumService       = service.NewTahunKurikulumService(tahunKurikulumRepository)
	tahunKurikulumController controller.TahunKurikulumController = controller.NewTahunKurikulumController(TahunKurikulumService)
)

func main() {
	defer config.CloseDatabaseConnection(db)
	r := gin.Default()

	tahunKurikulumRoutes := r.Group("/api/tahun_kurikulum")
	{
		tahunKurikulumRoutes.GET("/", tahunKurikulumController.All)
		tahunKurikulumRoutes.POST("/", tahunKurikulumController.Insert)
		tahunKurikulumRoutes.GET("/:id", tahunKurikulumController.FindByID)
		tahunKurikulumRoutes.PUT("/:id", tahunKurikulumController.Update)
		tahunKurikulumRoutes.DELETE("/:id", tahunKurikulumController.Delete)
	}
	r.Run(":4040")
}
