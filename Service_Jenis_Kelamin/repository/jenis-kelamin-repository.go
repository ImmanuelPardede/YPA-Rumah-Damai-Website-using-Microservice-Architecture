package repository

import (
	"github.com/iqbalsiagian17/Service_Jenis_Kelamin/model"
	"gorm.io/gorm"
)

type JenisKelaminRepository interface {
	InsertJenisKelamin(jenisKelamin model.JenisKelamin) model.JenisKelamin
	UpdateJenisKelamin(jenisKelamin model.JenisKelamin) model.JenisKelamin
	All() []model.JenisKelamin
	FindByID(jenisKelaminID uint) model.JenisKelamin
	DeleteJenisKelamin(jenisKelamin model.JenisKelamin)
}

type jenisKelaminConnection struct {
	connection *gorm.DB
}

func NewJenisKelaminRepository(db *gorm.DB) JenisKelaminRepository {
	return &jenisKelaminConnection{
		connection: db,
	}
}

func (db *jenisKelaminConnection) InsertJenisKelamin(jenisKelamin model.JenisKelamin) model.JenisKelamin {
	db.connection.Save(&jenisKelamin)
	return jenisKelamin
}

func (db *jenisKelaminConnection) UpdateJenisKelamin(jenisKelamin model.JenisKelamin) model.JenisKelamin {
	db.connection.Save(&jenisKelamin)
	return jenisKelamin
}

func (db *jenisKelaminConnection) All() []model.JenisKelamin {
	var jenisKelamins []model.JenisKelamin
	db.connection.Find(&jenisKelamins)
	return jenisKelamins
}

func (db *jenisKelaminConnection) FindByID(jenisKelaminID uint) model.JenisKelamin {
	var jenisKelamin model.JenisKelamin
	db.connection.Find(&jenisKelamin, jenisKelaminID)
	return jenisKelamin
}

func (db *jenisKelaminConnection) DeleteJenisKelamin(jenisKelamin model.JenisKelamin) {
	db.connection.Delete(&jenisKelamin)
}
