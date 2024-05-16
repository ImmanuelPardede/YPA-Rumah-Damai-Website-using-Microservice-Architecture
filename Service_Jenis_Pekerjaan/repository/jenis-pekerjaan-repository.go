package repository

import (
	"github.com/iqbalsiagian17/Service_Jenis_Pekerjaan/model"
	"gorm.io/gorm"
)

type JenisPekerjaanRepository interface {
	InsertJenisPekerjaan(jenisPekerjaan model.JenisPekerjaan) model.JenisPekerjaan
	UpdateJenisPekerjaan(jenisPekerjaan model.JenisPekerjaan) model.JenisPekerjaan
	All() []model.JenisPekerjaan
	FindByID(jenisPekerjaanID uint) model.JenisPekerjaan
	DeleteJenisPekerjaan(jenisPekerjaan model.JenisPekerjaan)
}

type jenisPekerjaanConnection struct {
	connection *gorm.DB
}

func NewJenisPekerjaanRepository(db *gorm.DB) JenisPekerjaanRepository {
	return &jenisPekerjaanConnection{
		connection: db,
	}
}

func (db *jenisPekerjaanConnection) InsertJenisPekerjaan(jenisPekerjaan model.JenisPekerjaan) model.JenisPekerjaan {
	db.connection.Save(&jenisPekerjaan)
	return jenisPekerjaan
}

func (db *jenisPekerjaanConnection) UpdateJenisPekerjaan(jenisPekerjaan model.JenisPekerjaan) model.JenisPekerjaan {
	db.connection.Save(&jenisPekerjaan)
	return jenisPekerjaan
}

func (db *jenisPekerjaanConnection) All() []model.JenisPekerjaan {
	var jenisPekerjaans []model.JenisPekerjaan
	db.connection.Find(&jenisPekerjaans)
	return jenisPekerjaans
}

func (db *jenisPekerjaanConnection) FindByID(jenisPekerjaanID uint) model.JenisPekerjaan {
	var jenisPekerjaan model.JenisPekerjaan
	db.connection.Find(&jenisPekerjaan, jenisPekerjaanID)
	return jenisPekerjaan
}

func (db *jenisPekerjaanConnection) DeleteJenisPekerjaan(jenisPekerjaan model.JenisPekerjaan) {
	db.connection.Delete(&jenisPekerjaan)
}
