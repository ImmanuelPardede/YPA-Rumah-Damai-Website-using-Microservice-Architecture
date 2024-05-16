package repository

import (
	"github.com/iqbalsiagian17/Service_Golongan_Darah/model"
	"gorm.io/gorm"
)

type GolonganDarahRepository interface {
	InsertGolonganDarah(golonganDarah model.GolonganDarah) model.GolonganDarah
	UpdateGolonganDarah(golonganDarah model.GolonganDarah) model.GolonganDarah
	All() []model.GolonganDarah
	FindByID(golonganDarahID uint) model.GolonganDarah
	DeleteGolonganDarah(golonganDarah model.GolonganDarah)
}

type golonganDarahConnection struct {
	connection *gorm.DB
}

func NewGolonganDarahRepository(db *gorm.DB) GolonganDarahRepository {
	return &golonganDarahConnection{
		connection: db,
	}
}

func (db *golonganDarahConnection) InsertGolonganDarah(golonganDarah model.GolonganDarah) model.GolonganDarah {
	db.connection.Save(&golonganDarah)
	return golonganDarah
}

func (db *golonganDarahConnection) UpdateGolonganDarah(golonganDarah model.GolonganDarah) model.GolonganDarah {
	db.connection.Save(&golonganDarah)
	return golonganDarah
}

func (db *golonganDarahConnection) All() []model.GolonganDarah {
	var golonganDarahs []model.GolonganDarah
	db.connection.Find(&golonganDarahs)
	return golonganDarahs
}

func (db *golonganDarahConnection) FindByID(golonganDarahID uint) model.GolonganDarah {
	var golonganDarah model.GolonganDarah
	db.connection.Find(&golonganDarah, golonganDarahID)
	return golonganDarah
}

func (db *golonganDarahConnection) DeleteGolonganDarah(golonganDarah model.GolonganDarah) {
	db.connection.Delete(&golonganDarah)
}
