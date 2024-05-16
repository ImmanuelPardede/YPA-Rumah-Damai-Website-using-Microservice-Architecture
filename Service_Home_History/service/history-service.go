package service

import (
	"log"

	"github.com/iqbalsiagian17/Service_Visitor_History/dto"
	"github.com/iqbalsiagian17/Service_Visitor_History/model"
	"github.com/iqbalsiagian17/Service_Visitor_History/repository"
	"github.com/mashingan/smapping"
)

// PromotedService is a contract about something that this service can do
type HistoryService interface {
	Insert(b dto.HistoryCreateDTO) model.History
	Update(b dto.HistoryUpdateDTO) model.History
	Delete(b model.History)
	All() []model.History
	FindByID(historyID uint64) model.History
}

type historyService struct {
	historyRepository repository.HistoryRepository
}

// NewHistoryService creates a new instance of HistoryService
func NewHistoryService(historyRepository repository.HistoryRepository) HistoryService {
	return &historyService{
		historyRepository: historyRepository,
	}
}

func (service *historyService) All() []model.History {
	return service.historyRepository.All()
}

func (service *historyService) FindByID(historyID uint64) model.History {

	id := uint(historyID)
	return service.historyRepository.FindByID(id)
}

func (service *historyService) Insert(b dto.HistoryCreateDTO) model.History {
	history := model.History{}
	err := smapping.FillStruct(&history, smapping.MapFields(&b))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.historyRepository.InsertHistory(history)
	return res
}

func (service *historyService) Update(b dto.HistoryUpdateDTO) model.History {
	history := model.History{}
	err := smapping.FillStruct(&history, smapping.MapFields(&b))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.historyRepository.UpdateHistory(history)
	return res
}

func (service *historyService) Delete(b model.History) {
	service.historyRepository.DeleteHistory(b)
}
