package service

import (
	"log"

	"github.com/iqbalsiagian17/Service_Tahun_Ajaran/dto"
	"github.com/iqbalsiagian17/Service_Tahun_Ajaran/model"
	"github.com/iqbalsiagian17/Service_Tahun_Ajaran/repository"
	"github.com/mashingan/smapping"
)

// TahunAjaranService is a contract about something that this service can do
type TahunAjaranService interface {
	Insert(a dto.TahunAjaranCreateDTO) model.TahunAjaran
	Update(a dto.TahunAjaranUpdateDTO) model.TahunAjaran
	Delete(a model.TahunAjaran)
	All() []model.TahunAjaran
	FindByID(tahunAjaranID uint64) model.TahunAjaran
}

type tahunAjaranService struct {
	tahunAjaranRepository repository.TahunAjaranRepository
}

// NewTahunAjaranService creates a new instance of TahunAjaranService
func NewTahunAjaranService(tahunAjaranRepository repository.TahunAjaranRepository) TahunAjaranService {
	return &tahunAjaranService{
		tahunAjaranRepository: tahunAjaranRepository,
	}
}

func (service *tahunAjaranService) All() []model.TahunAjaran {
	return service.tahunAjaranRepository.AllTahunAjaran()
}

func (service *tahunAjaranService) FindByID(tahunAjaranID uint64) model.TahunAjaran {
	id := uint(tahunAjaranID)
	return service.tahunAjaranRepository.FindByIDTahunAjaran(id)
}

func (service *tahunAjaranService) Insert(a dto.TahunAjaranCreateDTO) model.TahunAjaran {
	tahunAjaran := model.TahunAjaran{}
	err := smapping.FillStruct(&tahunAjaran, smapping.MapFields(&a))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.tahunAjaranRepository.InsertTahunAjaran(tahunAjaran)
	return res
}

func (service *tahunAjaranService) Update(a dto.TahunAjaranUpdateDTO) model.TahunAjaran {
	tahunAjaran := model.TahunAjaran{}
	err := smapping.FillStruct(&tahunAjaran, smapping.MapFields(&a))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.tahunAjaranRepository.UpdateTahunAjaran(tahunAjaran)
	return res
}

func (service *tahunAjaranService) Delete(a model.TahunAjaran) {
	service.tahunAjaranRepository.DeleteTahunAjaran(a)
}
