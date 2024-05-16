package main

import (
	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Visitor_Carousel/config"
	"github.com/iqbalsiagian17/Service_Visitor_Carousel/controller"
	"github.com/iqbalsiagian17/Service_Visitor_Carousel/repository"
	"github.com/iqbalsiagian17/Service_Visitor_Carousel/service"
	"gorm.io/gorm"
)

var (
	db                 *gorm.DB                      = config.SetupDatabaseConnection()
	carouselRepository repository.CarouselRepository = repository.NewCarouselRepository(db)
	CarouselService    service.CarouselService       = service.NewCarouselService(carouselRepository)
	carouselController controller.CarouselController = controller.NewCarouselController(CarouselService)
)

// membuat variable db dengan nilai setup database connection
func main() {
	defer config.CloseDatabaseConnection(db)
	r := gin.Default()

	carouselRoutes := r.Group("/api/carousel")
	{
		carouselRoutes.GET("/", carouselController.All)
		carouselRoutes.POST("/", carouselController.Insert)
		carouselRoutes.GET("/:id", carouselController.FindByID)
		carouselRoutes.PUT("/:id", carouselController.Update)
		carouselRoutes.DELETE("/:id", carouselController.Delete)
	}
	r.Run(":9001")
}
