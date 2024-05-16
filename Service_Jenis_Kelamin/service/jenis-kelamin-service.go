package service

import (
	"log"

	"github.com/iqbalsiagian17/Service_Jenis_Kelamin/dto"
	"github.com/iqbalsiagian17/Service_Jenis_Kelamin/model"
	"github.com/iqbalsiagian17/Service_Jenis_Kelamin/repository"
	"github.com/mashingan/smapping"
)

// JenisKelaminService is a contract about something that this service can do
type JenisKelaminService interface {
	Insert(a dto.JenisKelaminCreateDTO) model.JenisKelamin
	Update(a dto.JenisKelaminUpdateDTO) model.JenisKelamin
	Delete(a model.JenisKelamin)
	All() []model.JenisKelamin
	FindByID(jenisKelaminID uint64) model.JenisKelamin
}

type jenisKelaminService struct {
	jenisKelaminRepository repository.JenisKelaminRepository
}

// NewJenisKelaminService creates a new instance of JenisKelaminService
func NewJenisKelaminService(jenisKelaminRepository repository.JenisKelaminRepository) JenisKelaminService {
	return &jenisKelaminService{
		jenisKelaminRepository: jenisKelaminRepository,
	}
}

func (service *jenisKelaminService) All() []model.JenisKelamin {
	return service.jenisKelaminRepository.All()
}

func (service *jenisKelaminService) FindByID(jenisKelaminID uint64) model.JenisKelamin {
	id := uint(jenisKelaminID)
	return service.jenisKelaminRepository.FindByID(id)
}

func (service *jenisKelaminService) Insert(a dto.JenisKelaminCreateDTO) model.JenisKelamin {
	jenisKelamin := model.JenisKelamin{}
	err := smapping.FillStruct(&jenisKelamin, smapping.MapFields(&a))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.jenisKelaminRepository.InsertJenisKelamin(jenisKelamin)
	return res
}

func (service *jenisKelaminService) Update(a dto.JenisKelaminUpdateDTO) model.JenisKelamin {
	jenisKelamin := model.JenisKelamin{}
	err := smapping.FillStruct(&jenisKelamin, smapping.MapFields(&a))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.jenisKelaminRepository.UpdateJenisKelamin(jenisKelamin)
	return res
}

func (service *jenisKelaminService) Delete(a model.JenisKelamin) {
	service.jenisKelaminRepository.DeleteJenisKelamin(a)
}
