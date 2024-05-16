package main

import (
	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Jenis_Pekerjaan/config"
	"github.com/iqbalsiagian17/Service_Jenis_Pekerjaan/controller"
	"github.com/iqbalsiagian17/Service_Jenis_Pekerjaan/repository"
	"github.com/iqbalsiagian17/Service_Jenis_Pekerjaan/service"
	"gorm.io/gorm"
)

var (
	db                       *gorm.DB                            = config.SetupDatabaseConnection()
	jenisPekerjaanRepository repository.JenisPekerjaanRepository = repository.NewJenisPekerjaanRepository(db)
	JenisPekerjaanService    service.JenisPekerjaanService       = service.NewJenisPekerjaanService(jenisPekerjaanRepository)
	jenisPekerjaanController controller.JenisPekerjaanController = controller.NewJenisPekerjaanController(JenisPekerjaanService)
)

func main() {
	defer config.CloseDatabaseConnection(db)
	r := gin.Default()

	jenisPekerjaanRoutes := r.Group("/api/jenis_pekerjaan")
	{
		jenisPekerjaanRoutes.GET("/", jenisPekerjaanController.All)
		jenisPekerjaanRoutes.POST("/", jenisPekerjaanController.Insert)
		jenisPekerjaanRoutes.GET("/:id", jenisPekerjaanController.FindByID)
		jenisPekerjaanRoutes.PUT("/:id", jenisPekerjaanController.Update)
		jenisPekerjaanRoutes.DELETE("/:id", jenisPekerjaanController.Delete)
	}
	r.Run(":3330")
}
