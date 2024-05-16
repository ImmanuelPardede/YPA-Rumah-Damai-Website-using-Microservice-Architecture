package main

import (
	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Jenis_Kelamin/config"
	"github.com/iqbalsiagian17/Service_Jenis_Kelamin/controller"
	"github.com/iqbalsiagian17/Service_Jenis_Kelamin/repository"
	"github.com/iqbalsiagian17/Service_Jenis_Kelamin/service"
	"gorm.io/gorm"
)

var (
	db                     *gorm.DB                          = config.SetupDatabaseConnection()
	jenisKelaminRepository repository.JenisKelaminRepository = repository.NewJenisKelaminRepository(db)
	JenisKelaminService    service.JenisKelaminService       = service.NewJenisKelaminService(jenisKelaminRepository)
	jenisKelaminController controller.JenisKelaminController = controller.NewJenisKelaminController(JenisKelaminService)
)

func main() {
	defer config.CloseDatabaseConnection(db)
	r := gin.Default()

	jenisKelaminRoutes := r.Group("/api/jenis_kelamin")
	{
		jenisKelaminRoutes.GET("/", jenisKelaminController.All)
		jenisKelaminRoutes.POST("/", jenisKelaminController.Insert)
		jenisKelaminRoutes.GET("/:id", jenisKelaminController.FindByID)
		jenisKelaminRoutes.PUT("/:id", jenisKelaminController.Update)
		jenisKelaminRoutes.DELETE("/:id", jenisKelaminController.Delete)
	}
	r.Run(":2220")
}
