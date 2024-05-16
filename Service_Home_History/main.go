package main

import (
	"github.com/gin-gonic/gin"
	"github.com/iqbalsiagian17/Service_Visitor_History/config"
	"github.com/iqbalsiagian17/Service_Visitor_History/controller"
	"github.com/iqbalsiagian17/Service_Visitor_History/repository"
	"github.com/iqbalsiagian17/Service_Visitor_History/service"
	"gorm.io/gorm"
)

var (
	db                *gorm.DB                     = config.SetupDatabaseConnection()
	historyRepository repository.HistoryRepository = repository.NewHistoryRepository(db)
	HistoryService    service.HistoryService       = service.NewHistoryService(historyRepository)
	historyController controller.HistoryController = controller.NewHistoryController(HistoryService)
)

// membuat variable db dengan nilai setup database connection
func main() {
	defer config.CloseDatabaseConnection(db)
	r := gin.Default()

	historyRoutes := r.Group("/api/history")
	{
		historyRoutes.GET("/", historyController.All)
		historyRoutes.POST("/", historyController.Insert)
		historyRoutes.GET("/:id", historyController.FindByID)
		historyRoutes.PUT("/:id", historyController.Update)
		historyRoutes.DELETE("/:id", historyController.Delete)
	}
	r.Run(":9002")
}
