package service

import (
	"log"

	"github.com/iqbalsiagian17/Service_Tahun_Kurikulum/dto"
	"github.com/iqbalsiagian17/Service_Tahun_Kurikulum/model"
	"github.com/iqbalsiagian17/Service_Tahun_Kurikulum/repository"
	"github.com/mashingan/smapping"
)

// TahunKurikulumService is a contract about something that this service can do
type TahunKurikulumService interface {
	Insert(a dto.TahunKurikulumCreateDTO) model.TahunKurikulum
	Update(a dto.TahunKurikulumUpdateDTO) model.TahunKurikulum
	Delete(a model.TahunKurikulum)
	All() []model.TahunKurikulum
	FindByID(tahunKurikulumID uint64) model.TahunKurikulum
}

type tahunKurikulumService struct {
	tahunKurikulumRepository repository.TahunKurikulumRepository
}

// NewTahunKurikulumService creates a new instance of TahunKurikulumService
func NewTahunKurikulumService(tahunKurikulumRepository repository.TahunKurikulumRepository) TahunKurikulumService {
	return &tahunKurikulumService{
		tahunKurikulumRepository: tahunKurikulumRepository,
	}
}

func (service *tahunKurikulumService) All() []model.TahunKurikulum {
	return service.tahunKurikulumRepository.AllTahunKurikulum()
}

func (service *tahunKurikulumService) FindByID(tahunKurikulumID uint64) model.TahunKurikulum {
	id := uint(tahunKurikulumID)
	return service.tahunKurikulumRepository.FindByIDTahunKurikulum(id)
}

func (service *tahunKurikulumService) Insert(a dto.TahunKurikulumCreateDTO) model.TahunKurikulum {
	tahunKurikulum := model.TahunKurikulum{}
	err := smapping.FillStruct(&tahunKurikulum, smapping.MapFields(&a))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.tahunKurikulumRepository.InsertTahunKurikulum(tahunKurikulum)
	return res
}

func (service *tahunKurikulumService) Update(a dto.TahunKurikulumUpdateDTO) model.TahunKurikulum {
	tahunKurikulum := model.TahunKurikulum{}
	err := smapping.FillStruct(&tahunKurikulum, smapping.MapFields(&a))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.tahunKurikulumRepository.UpdateTahunKurikulum(tahunKurikulum)
	return res
}

func (service *tahunKurikulumService) Delete(a model.TahunKurikulum) {
	service.tahunKurikulumRepository.DeleteTahunKurikulum(a)
}
