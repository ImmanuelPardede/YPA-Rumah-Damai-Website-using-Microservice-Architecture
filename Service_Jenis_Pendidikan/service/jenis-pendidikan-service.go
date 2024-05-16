package service

import (
	"log"

	"github.com/iqbalsiagian17/Service_Jenis_Pendidikan/dto"
	"github.com/iqbalsiagian17/Service_Jenis_Pendidikan/model"
	"github.com/iqbalsiagian17/Service_Jenis_Pendidikan/repository"
	"github.com/mashingan/smapping"
)

// JenisPendidikanService is a contract about something that this service can do
type JenisPendidikanService interface {
	Insert(a dto.JenisPendidikanCreateDTO) model.JenisPendidikan
	Update(a dto.JenisPendidikanUpdateDTO) model.JenisPendidikan
	Delete(a model.JenisPendidikan)
	All() []model.JenisPendidikan
	FindByID(jenisPendidikanID uint64) model.JenisPendidikan
}

type jenisPendidikanService struct {
	jenisPendidikanRepository repository.JenisPendidikanRepository
}

// NewJenisPendidikanService creates a new instance of JenisPendidikanService
func NewJenisPendidikanService(jenisPendidikanRepository repository.JenisPendidikanRepository) JenisPendidikanService {
	return &jenisPendidikanService{
		jenisPendidikanRepository: jenisPendidikanRepository,
	}
}

func (service *jenisPendidikanService) All() []model.JenisPendidikan {
	return service.jenisPendidikanRepository.All()
}

func (service *jenisPendidikanService) FindByID(jenisPendidikanID uint64) model.JenisPendidikan {
	id := uint(jenisPendidikanID)
	return service.jenisPendidikanRepository.FindByID(id)
}

func (service *jenisPendidikanService) Insert(a dto.JenisPendidikanCreateDTO) model.JenisPendidikan {
	jenisPendidikan := model.JenisPendidikan{}
	err := smapping.FillStruct(&jenisPendidikan, smapping.MapFields(&a))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.jenisPendidikanRepository.InsertJenisPendidikan(jenisPendidikan)
	return res
}

func (service *jenisPendidikanService) Update(a dto.JenisPendidikanUpdateDTO) model.JenisPendidikan {
	jenisPendidikan := model.JenisPendidikan{}
	err := smapping.FillStruct(&jenisPendidikan, smapping.MapFields(&a))
	if err != nil {
		log.Fatalf("Failed map %v", err)
	}

	res := service.jenisPendidikanRepository.UpdateJenisPendidikan(jenisPendidikan)
	return res
}

func (service *jenisPendidikanService) Delete(a model.JenisPendidikan) {
	service.jenisPendidikanRepository.DeleteJenisPendidikan(a)
}
