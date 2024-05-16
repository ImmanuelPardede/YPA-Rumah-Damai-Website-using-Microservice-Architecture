package repository

import (
	"github.com/iqbalsiagian17/Service_Donasi/model"
	"gorm.io/gorm"
)

type DonasiRepository interface {
	InsertDonasi(donasi model.Donasi) model.Donasi
	UpdateDonasi(donasi model.Donasi) model.Donasi
	All() []model.Donasi
	FindByID(donasiID uint) model.Donasi
	DeleteDonasi(donasi model.Donasi)
}

type donasiConnection struct {
	connection *gorm.DB
}

func NewDonasiRepository(db *gorm.DB) DonasiRepository {
	return &donasiConnection{
		connection: db,
	}
}

func (db *donasiConnection) InsertDonasi(donasi model.Donasi) model.Donasi {
	db.connection.Save(&donasi)
	return donasi
}

func (db *donasiConnection) UpdateDonasi(donasi model.Donasi) model.Donasi {
	db.connection.Save(&donasi)
	return donasi
}

func (db *donasiConnection) All() []model.Donasi {
	var donasis []model.Donasi
	db.connection.Find(&donasis)
	return donasis
}

func (db *donasiConnection) FindByID(donasiID uint) model.Donasi {
	var donasi model.Donasi
	db.connection.Find(&donasi, donasiID)
	return donasi
}

func (db *donasiConnection) DeleteDonasi(donasi model.Donasi) {
	db.connection.Delete(&donasi)
}
