package repository

import (
	"github.com/iqbalsiagian17/Service_Tahun_Ajaran/model"
	"gorm.io/gorm"
)

type TahunAjaranRepository interface {
	InsertTahunAjaran(tahunAjaran model.TahunAjaran) model.TahunAjaran
	UpdateTahunAjaran(tahunAjaran model.TahunAjaran) model.TahunAjaran
	AllTahunAjaran() []model.TahunAjaran
	FindByIDTahunAjaran(tahunAjaranID uint) model.TahunAjaran
	DeleteTahunAjaran(tahunAjaran model.TahunAjaran)
}

type tahunAjaranConnection struct {
	connection *gorm.DB
}

func NewTahunAjaranRepository(db *gorm.DB) TahunAjaranRepository {
	return &tahunAjaranConnection{
		connection: db,
	}
}

func (db *tahunAjaranConnection) InsertTahunAjaran(tahunAjaran model.TahunAjaran) model.TahunAjaran {
	db.connection.Save(&tahunAjaran)
	return tahunAjaran
}

func (db *tahunAjaranConnection) UpdateTahunAjaran(tahunAjaran model.TahunAjaran) model.TahunAjaran {
	db.connection.Save(&tahunAjaran)
	return tahunAjaran
}

func (db *tahunAjaranConnection) AllTahunAjaran() []model.TahunAjaran {
	var tahunAjarans []model.TahunAjaran
	db.connection.Find(&tahunAjarans)
	return tahunAjarans
}

func (db *tahunAjaranConnection) FindByIDTahunAjaran(tahunAjaranID uint) model.TahunAjaran {
	var tahunAjaran model.TahunAjaran
	db.connection.Find(&tahunAjaran, tahunAjaranID)
	return tahunAjaran
}

func (db *tahunAjaranConnection) DeleteTahunAjaran(tahunAjaran model.TahunAjaran) {
	db.connection.Delete(&tahunAjaran)
}
