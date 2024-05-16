package service

import (
	"log"

	"github.com/iqbalsiagian17/Service_Agama/dto"
	"github.com/iqbalsiagian17/Service_Agama/model"
	"github.com/iqbalsiagian17/Service_Agama/repository"
	"github.com/mashingan/smapping"
)

// AgamaService is a contract about something that this service can do
type AgamaService interface {
	Insert(a dto.AgamaCreateDTO) model.Agama
	Update(a dto.AgamaUpdateDTO) model.Agama
	Delete(a model.Agama)
	All() []model.Agama
	FindByID(agamaID uint64) model.Agama
}

type agamaService struct {
	agamaRepository repository.AgamaRepository
}

// NewAgamaService creates a new instance of AgamaService
func NewAgamaService(agamaRepository repository.AgamaRepository) AgamaService {
	return &agamaService{
		agamaRepository: agamaRepository,
	}
}

func (service *agamaService) All() []model.Agama {
	return service.agamaRepository.All()
}

func (service *agamaService) FindByID(agamaID uint64) model.Agama {
	id := uint(agamaID)
	return service.agamaRepository.FindByID(id)
}

func (service *agamaService) Insert(a dto.AgamaCreateDTO) model.Agama {
	agama := model.Agama{}
	err := smapping.FillStruct(&agama, smapping.MapFields(&a))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.agamaRepository.InsertAgama(agama)
	return res
}

func (service *agamaService) Update(a dto.AgamaUpdateDTO) model.Agama {
	agama := model.Agama{}
	err := smapping.FillStruct(&agama, smapping.MapFields(&a))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.agamaRepository.UpdateAgama(agama)
	return res
}

func (service *agamaService) Delete(a model.Agama) {
	service.agamaRepository.DeleteAgama(a)
}
