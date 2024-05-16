package repository

import (
	"github.com/iqbalsiagian17/Service_Jenis_Disabilitas/model"
	"gorm.io/gorm"
)

type JenisDisabilitasRepository interface {
	InsertJenisDisabilitas(jenisDisabilitas model.JenisDisabilitas) model.JenisDisabilitas
	UpdateJenisDisabilitas(jenisDisabilitas model.JenisDisabilitas) model.JenisDisabilitas
	All() []model.JenisDisabilitas
	FindByID(jenisDisabilitasID uint) model.JenisDisabilitas
	DeleteJenisDisabilitas(jenisDisabilitas model.JenisDisabilitas)
}

type jenisDisabilitasConnection struct {
	connection *gorm.DB
}

func NewJenisDisabilitasRepository(db *gorm.DB) JenisDisabilitasRepository {
	return &jenisDisabilitasConnection{
		connection: db,
	}
}

func (db *jenisDisabilitasConnection) InsertJenisDisabilitas(jenisDisabilitas model.JenisDisabilitas) model.JenisDisabilitas {
	db.connection.Save(&jenisDisabilitas)
	return jenisDisabilitas
}

func (db *jenisDisabilitasConnection) UpdateJenisDisabilitas(jenisDisabilitas model.JenisDisabilitas) model.JenisDisabilitas {
	db.connection.Save(&jenisDisabilitas)
	return jenisDisabilitas
}

func (db *jenisDisabilitasConnection) All() []model.JenisDisabilitas {
	var jenisDisabilitas []model.JenisDisabilitas
	db.connection.Find(&jenisDisabilitas)
	return jenisDisabilitas
}

func (db *jenisDisabilitasConnection) FindByID(jenisDisabilitasID uint) model.JenisDisabilitas {
	var jenisDisabilitas model.JenisDisabilitas
	db.connection.Find(&jenisDisabilitas, jenisDisabilitasID)
	return jenisDisabilitas
}

func (db *jenisDisabilitasConnection) DeleteJenisDisabilitas(jenisDisabilitas model.JenisDisabilitas) {
	db.connection.Delete(&jenisDisabilitas)
}
