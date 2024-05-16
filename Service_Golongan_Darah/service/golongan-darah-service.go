package service

import (
	"log"

	"github.com/iqbalsiagian17/Service_Golongan_Darah/dto"
	"github.com/iqbalsiagian17/Service_Golongan_Darah/model"
	"github.com/iqbalsiagian17/Service_Golongan_Darah/repository"
	"github.com/mashingan/smapping"
)

// GolonganDarahService is a contract about something that this service can do
type GolonganDarahService interface {
	Insert(a dto.GolonganDarahCreateDTO) model.GolonganDarah
	Update(a dto.GolonganDarahUpdateDTO) model.GolonganDarah
	Delete(a model.GolonganDarah)
	All() []model.GolonganDarah
	FindByID(golonganDarahID uint64) model.GolonganDarah
}

type golonganDarahService struct {
	golonganDarahRepository repository.GolonganDarahRepository
}

// NewGolonganDarahService creates a new instance of GolonganDarahService
func NewGolonganDarahService(golonganDarahRepository repository.GolonganDarahRepository) GolonganDarahService {
	return &golonganDarahService{
		golonganDarahRepository: golonganDarahRepository,
	}
}

func (service *golonganDarahService) All() []model.GolonganDarah {
	return service.golonganDarahRepository.All()
}

func (service *golonganDarahService) FindByID(golonganDarahID uint64) model.GolonganDarah {
	id := uint(golonganDarahID)
	return service.golonganDarahRepository.FindByID(id)
}

func (service *golonganDarahService) Insert(a dto.GolonganDarahCreateDTO) model.GolonganDarah {
	golonganDarah := model.GolonganDarah{}
	err := smapping.FillStruct(&golonganDarah, smapping.MapFields(&a))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.golonganDarahRepository.InsertGolonganDarah(golonganDarah)
	return res
}

func (service *golonganDarahService) Update(a dto.GolonganDarahUpdateDTO) model.GolonganDarah {
	golonganDarah := model.GolonganDarah{}
	err := smapping.FillStruct(&golonganDarah, smapping.MapFields(&a))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.golonganDarahRepository.UpdateGolonganDarah(golonganDarah)
	return res
}

func (service *golonganDarahService) Delete(a model.GolonganDarah) {
	service.golonganDarahRepository.DeleteGolonganDarah(a)
}
