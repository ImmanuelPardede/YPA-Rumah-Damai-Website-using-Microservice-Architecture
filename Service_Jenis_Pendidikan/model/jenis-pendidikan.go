package model

import (
	"gorm.io/gorm"
)

type JenisPendidikan struct {
	gorm.Model
	JenisPendidikan string `gorm:"type:varchar(255)" json:"jenis_pendidikan"`
}
