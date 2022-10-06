import time
from datetime import datetime

from pydantic import BaseModel
from enum import Enum


# 'flight', 'railway', 'car', 'walk'
class TravelType(Enum):
    flight = 'flight'
    railway = 'railway'
    car = 'car'
    walk = 'walk'


class Travel(BaseModel):
    id: int
    ts_created: str = datetime.utcnow()
    ts_start: str
    ts_end: str
    user_id: int
    type: TravelType


class Destination(BaseModel):
    id: int
    from_city: int
    to_city: int


class User(BaseModel):
    id: int
    username: str
    password: str | None = None
