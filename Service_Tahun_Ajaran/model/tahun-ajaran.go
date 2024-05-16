package model

import (
	"gorm.io/gorm"
)

type TahunAjaran struct {
	gorm.Model
	TahunAjaran int `gorm:"type:int" json:"tahun_ajaran"`
}
