package service

import (
	"log"

	"github.com/iqbalsiagian17/Service_Donasi/dto"
	"github.com/iqbalsiagian17/Service_Donasi/model"
	"github.com/iqbalsiagian17/Service_Donasi/repository"
	"github.com/mashingan/smapping"
)

// DonasiService is a contract about something that this service can do
type DonasiService interface {
	Insert(d dto.DonasiCreateDTO) model.Donasi
	Update(d dto.DonasiUpdateDTO) model.Donasi
	Delete(d model.Donasi)
	All() []model.Donasi
	FindByID(donasiID uint64) model.Donasi
}

type donasiService struct {
	donasiRepository repository.DonasiRepository
}

// NewDonasiService creates a new instance of DonasiService
func NewDonasiService(donasiRepository repository.DonasiRepository) DonasiService {
	return &donasiService{
		donasiRepository: donasiRepository,
	}
}

func (service *donasiService) All() []model.Donasi {
	return service.donasiRepository.All()
}

func (service *donasiService) FindByID(donasiID uint64) model.Donasi {
	id := uint(donasiID)
	return service.donasiRepository.FindByID(id)
}

func (service *donasiService) Insert(d dto.DonasiCreateDTO) model.Donasi {
	donasi := model.Donasi{}
	err := smapping.FillStruct(&donasi, smapping.MapFields(&d))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.donasiRepository.InsertDonasi(donasi)
	return res
}

func (service *donasiService) Update(d dto.DonasiUpdateDTO) model.Donasi {
	donasi := model.Donasi{}
	err := smapping.FillStruct(&donasi, smapping.MapFields(&d))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.donasiRepository.UpdateDonasi(donasi)
	return res
}

func (service *donasiService) Delete(d model.Donasi) {
	service.donasiRepository.DeleteDonasi(d)
}
