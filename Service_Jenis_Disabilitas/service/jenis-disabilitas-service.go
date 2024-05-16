package service

import (
	"log"

	"github.com/iqbalsiagian17/Service_Jenis_Disabilitas/dto"
	"github.com/iqbalsiagian17/Service_Jenis_Disabilitas/model"
	"github.com/iqbalsiagian17/Service_Jenis_Disabilitas/repository"
	"github.com/mashingan/smapping"
)

// JenisDisabilitasService is a contract about something that this service can do
type JenisDisabilitasService interface {
	Insert(d dto.JenisDisabilitasCreateDTO) model.JenisDisabilitas
	Update(d dto.JenisDisabilitasUpdateDTO) model.JenisDisabilitas
	Delete(d model.JenisDisabilitas)
	All() []model.JenisDisabilitas
	FindByID(jenisDisabilitasID uint64) model.JenisDisabilitas
}

type jenisDisabilitasService struct {
	jenisDisabilitasRepository repository.JenisDisabilitasRepository
}

// NewJenisDisabilitasService creates a new instance of JenisDisabilitasService
func NewJenisDisabilitasService(jenisDisabilitasRepository repository.JenisDisabilitasRepository) JenisDisabilitasService {
	return &jenisDisabilitasService{
		jenisDisabilitasRepository: jenisDisabilitasRepository,
	}
}

func (service *jenisDisabilitasService) All() []model.JenisDisabilitas {
	return service.jenisDisabilitasRepository.All()
}

func (service *jenisDisabilitasService) FindByID(jenisDisabilitasID uint64) model.JenisDisabilitas {
	id := uint(jenisDisabilitasID)
	return service.jenisDisabilitasRepository.FindByID(id)
}

func (service *jenisDisabilitasService) Insert(d dto.JenisDisabilitasCreateDTO) model.JenisDisabilitas {
	jenisDisabilitas := model.JenisDisabilitas{}
	err := smapping.FillStruct(&jenisDisabilitas, smapping.MapFields(&d))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.jenisDisabilitasRepository.InsertJenisDisabilitas(jenisDisabilitas)
	return res
}

func (service *jenisDisabilitasService) Update(d dto.JenisDisabilitasUpdateDTO) model.JenisDisabilitas {
	jenisDisabilitas := model.JenisDisabilitas{}
	err := smapping.FillStruct(&jenisDisabilitas, smapping.MapFields(&d))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.jenisDisabilitasRepository.UpdateJenisDisabilitas(jenisDisabilitas)
	return res
}

func (service *jenisDisabilitasService) Delete(d model.JenisDisabilitas) {
	service.jenisDisabilitasRepository.DeleteJenisDisabilitas(d)
}
