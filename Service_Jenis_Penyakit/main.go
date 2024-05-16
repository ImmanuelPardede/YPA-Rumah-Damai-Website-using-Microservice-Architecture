package main

import (
	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Jenis_Penyakit/config"
	"github.com/iqbalsiagian17/Service_Jenis_Penyakit/controller"
	"github.com/iqbalsiagian17/Service_Jenis_Penyakit/repository"
	"github.com/iqbalsiagian17/Service_Jenis_Penyakit/service"
	"gorm.io/gorm"
)

var (
	db                      *gorm.DB                           = config.SetupDatabaseConnection()
	jenisPenyakitRepository repository.JenisPenyakitRepository = repository.NewJenisPenyakitRepository(db)
	JenisPenyakitService    service.JenisPenyakitService       = service.NewJenisPenyakitService(jenisPenyakitRepository)
	jenisPenyakitController controller.JenisPenyakitController = controller.NewJenisPenyakitController(JenisPenyakitService)
)

func main() {
	defer config.CloseDatabaseConnection(db)
	r := gin.Default()

	jenisPenyakitRoutes := r.Group("/api/jenis_penyakit")
	{
		jenisPenyakitRoutes.GET("/", jenisPenyakitController.All)
		jenisPenyakitRoutes.POST("/", jenisPenyakitController.Insert)
		jenisPenyakitRoutes.GET("/:id", jenisPenyakitController.FindByID)
		jenisPenyakitRoutes.PUT("/:id", jenisPenyakitController.Update)
		jenisPenyakitRoutes.DELETE("/:id", jenisPenyakitController.Delete)
	}
	r.Run(":5550")
}
