package main

import (
	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Jenis_Pendidikan/config"
	"github.com/iqbalsiagian17/Service_Jenis_Pendidikan/controller"
	"github.com/iqbalsiagian17/Service_Jenis_Pendidikan/repository"
	"github.com/iqbalsiagian17/Service_Jenis_Pendidikan/service"
	"gorm.io/gorm"
)

var (
	db                        *gorm.DB                             = config.SetupDatabaseConnection()
	jenisPendidikanRepository repository.JenisPendidikanRepository = repository.NewJenisPendidikanRepository(db)
	JenisPendidikanService    service.JenisPendidikanService       = service.NewJenisPendidikanService(jenisPendidikanRepository)
	jenisPendidikanController controller.JenisPendidikanController = controller.NewJenisPendidikanController(JenisPendidikanService)
)

func main() {
	defer config.CloseDatabaseConnection(db)
	r := gin.Default()

	jenisPendidikanRoutes := r.Group("/api/jenis_pendidikan")
	{
		jenisPendidikanRoutes.GET("/", jenisPendidikanController.All)
		jenisPendidikanRoutes.POST("/", jenisPendidikanController.Insert)
		jenisPendidikanRoutes.GET("/:id", jenisPendidikanController.FindByID)
		jenisPendidikanRoutes.PUT("/:id", jenisPendidikanController.Update)
		jenisPendidikanRoutes.DELETE("/:id", jenisPendidikanController.Delete)
	}
	r.Run(":4440")
}
