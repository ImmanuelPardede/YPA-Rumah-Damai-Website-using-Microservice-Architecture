package main

import (
	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Jenis_Sponsorship/config"
	"github.com/iqbalsiagian17/Service_Jenis_Sponsorship/controller"
	"github.com/iqbalsiagian17/Service_Jenis_Sponsorship/repository"
	"github.com/iqbalsiagian17/Service_Jenis_Sponsorship/service"
	"gorm.io/gorm"
)

var (
	db                         *gorm.DB                              = config.SetupDatabaseConnection()
	jenisSponsorshipRepository repository.JenisSponsorshipRepository = repository.NewJenisSponsorshipRepository(db)
	JenisSponsorshipService    service.JenisSponsorshipService       = service.NewJenisSponsorshipService(jenisSponsorshipRepository)
	jenisSponsorshipController controller.JenisSponsorshipController = controller.NewJenisSponsorshipController(JenisSponsorshipService)
)

func main() {
	defer config.CloseDatabaseConnection(db)
	r := gin.Default()

	jenisSponsorshipRoutes := r.Group("/api/jenis_sponsorship")
	{
		jenisSponsorshipRoutes.GET("/", jenisSponsorshipController.All)
		jenisSponsorshipRoutes.POST("/", jenisSponsorshipController.Insert)
		jenisSponsorshipRoutes.GET("/:id", jenisSponsorshipController.FindByID)
		jenisSponsorshipRoutes.PUT("/:id", jenisSponsorshipController.Update)
		jenisSponsorshipRoutes.DELETE("/:id", jenisSponsorshipController.Delete)
	}
	r.Run(":6660")
}
