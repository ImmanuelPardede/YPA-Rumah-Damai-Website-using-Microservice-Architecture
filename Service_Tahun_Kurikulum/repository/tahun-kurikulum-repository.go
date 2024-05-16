package repository

import (
	"github.com/iqbalsiagian17/Service_Tahun_Kurikulum/model"
	"gorm.io/gorm"
)

type TahunKurikulumRepository interface {
	InsertTahunKurikulum(tahunKurikulum model.TahunKurikulum) model.TahunKurikulum
	UpdateTahunKurikulum(tahunKurikulum model.TahunKurikulum) model.TahunKurikulum
	AllTahunKurikulum() []model.TahunKurikulum
	FindByIDTahunKurikulum(tahunKurikulumID uint) model.TahunKurikulum
	DeleteTahunKurikulum(tahunKurikulum model.TahunKurikulum)
}

type tahunKurikulumConnection struct {
	connection *gorm.DB
}

func NewTahunKurikulumRepository(db *gorm.DB) TahunKurikulumRepository {
	return &tahunKurikulumConnection{
		connection: db,
	}
}

func (db *tahunKurikulumConnection) InsertTahunKurikulum(tahunKurikulum model.TahunKurikulum) model.TahunKurikulum {
	db.connection.Save(&tahunKurikulum)
	return tahunKurikulum
}

func (db *tahunKurikulumConnection) UpdateTahunKurikulum(tahunKurikulum model.TahunKurikulum) model.TahunKurikulum {
	db.connection.Save(&tahunKurikulum)
	return tahunKurikulum
}

func (db *tahunKurikulumConnection) AllTahunKurikulum() []model.TahunKurikulum {
	var tahunKurikulums []model.TahunKurikulum
	db.connection.Find(&tahunKurikulums)
	return tahunKurikulums
}

func (db *tahunKurikulumConnection) FindByIDTahunKurikulum(tahunKurikulumID uint) model.TahunKurikulum {
	var tahunKurikulum model.TahunKurikulum
	db.connection.Find(&tahunKurikulum, tahunKurikulumID)
	return tahunKurikulum
}

func (db *tahunKurikulumConnection) DeleteTahunKurikulum(tahunKurikulum model.TahunKurikulum) {
	db.connection.Delete(&tahunKurikulum)
}
