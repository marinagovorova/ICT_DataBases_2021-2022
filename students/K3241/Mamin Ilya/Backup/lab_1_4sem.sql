--
-- PostgreSQL database dump
--

-- Dumped from database version 14.5
-- Dumped by pg_dump version 14.5

-- Started on 2022-10-02 22:47:12

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3382 (class 1262 OID 16394)
-- Name: Lab_1_4sem; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE "Lab_1_4sem" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Russian_Russia.1251';


ALTER DATABASE "Lab_1_4sem" OWNER TO postgres;

\connect "Lab_1_4sem"

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3 (class 2615 OID 19548)
-- Name: 4sem; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA "4sem";


ALTER SCHEMA "4sem" OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 214 (class 1259 OID 19562)
-- Name: carriage; Type: TABLE; Schema: 4sem; Owner: postgres
--

CREATE TABLE "4sem".carriage (
    train_number integer NOT NULL,
    number_of_place integer NOT NULL,
    id_carriage integer NOT NULL,
    place_id integer NOT NULL,
    id_train integer NOT NULL
);


ALTER TABLE "4sem".carriage OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 19561)
-- Name: carriage_id_carriage_seq; Type: SEQUENCE; Schema: 4sem; Owner: postgres
--

ALTER TABLE "4sem".carriage ALTER COLUMN id_carriage ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME "4sem".carriage_id_carriage_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 220 (class 1259 OID 19584)
-- Name: desttination; Type: TABLE; Schema: 4sem; Owner: postgres
--

CREATE TABLE "4sem".desttination (
    id_desttination integer NOT NULL,
    item_name character(20) NOT NULL,
    sattelment_category character(20) NOT NULL
);


ALTER TABLE "4sem".desttination OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 19583)
-- Name: desttination_id_desttination_seq; Type: SEQUENCE; Schema: 4sem; Owner: postgres
--

ALTER TABLE "4sem".desttination ALTER COLUMN id_desttination ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME "4sem".desttination_id_desttination_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 222 (class 1259 OID 19590)
-- Name: passenger; Type: TABLE; Schema: 4sem; Owner: postgres
--

CREATE TABLE "4sem".passenger (
    id_passenger integer NOT NULL,
    passenger_surname character(20) NOT NULL,
    passenger_name character(20) NOT NULL,
    passenger_patronymic character(20) NOT NULL,
    passport_id integer NOT NULL,
    "ticket_ number" integer NOT NULL
);


ALTER TABLE "4sem".passenger OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 19589)
-- Name: passenger_id_passenger_seq; Type: SEQUENCE; Schema: 4sem; Owner: postgres
--

ALTER TABLE "4sem".passenger ALTER COLUMN id_passenger ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME "4sem".passenger_id_passenger_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 212 (class 1259 OID 19556)
-- Name: place; Type: TABLE; Schema: 4sem; Owner: postgres
--

CREATE TABLE "4sem".place (
    id_place integer NOT NULL,
    number_place integer NOT NULL,
    place_taken character(20) NOT NULL,
    departure date NOT NULL,
    ticket_number integer NOT NULL,
    id_carriage integer NOT NULL,
    place_type character(20) NOT NULL
);


ALTER TABLE "4sem".place OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 19555)
-- Name: place_id_place_seq; Type: SEQUENCE; Schema: 4sem; Owner: postgres
--

ALTER TABLE "4sem".place ALTER COLUMN id_place ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME "4sem".place_id_place_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 210 (class 1259 OID 19550)
-- Name: ticket; Type: TABLE; Schema: 4sem; Owner: postgres
--

CREATE TABLE "4sem".ticket (
    desttination character(20) NOT NULL,
    train_number integer NOT NULL,
    id_place integer NOT NULL,
    ticket_price integer NOT NULL,
    data_of_sale date NOT NULL,
    status character(20) NOT NULL,
    place_type integer NOT NULL,
    id_desttination integer NOT NULL,
    payment_state character(20) NOT NULL,
    return_status character(20) NOT NULL,
    id_passengers integer NOT NULL
);


ALTER TABLE "4sem".ticket OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 19549)
-- Name: ticket_train_number_seq; Type: SEQUENCE; Schema: 4sem; Owner: postgres
--

ALTER TABLE "4sem".ticket ALTER COLUMN train_number ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME "4sem".ticket_train_number_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 216 (class 1259 OID 19568)
-- Name: train; Type: TABLE; Schema: 4sem; Owner: postgres
--

CREATE TABLE "4sem".train (
    train_number integer NOT NULL,
    train_type character(20) NOT NULL,
    departure_time interval(6)[] NOT NULL,
    desttination character(20) NOT NULL,
    id_train integer NOT NULL,
    train_name character(20) NOT NULL,
    arrival_time interval(6)[] NOT NULL,
    departure date NOT NULL
);


ALTER TABLE "4sem".train OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 19567)
-- Name: train_id_train_seq; Type: SEQUENCE; Schema: 4sem; Owner: postgres
--

ALTER TABLE "4sem".train ALTER COLUMN id_train ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME "4sem".train_id_train_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 218 (class 1259 OID 19576)
-- Name: waypoint; Type: TABLE; Schema: 4sem; Owner: postgres
--

CREATE TABLE "4sem".waypoint (
    train_number integer NOT NULL,
    train_name character(20) NOT NULL,
    id_train integer NOT NULL,
    arrival_time interval(6)[] NOT NULL,
    departure_time interval(6)[] NOT NULL,
    id_waypoint integer NOT NULL,
    id_desttination integer NOT NULL
);


ALTER TABLE "4sem".waypoint OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 19575)
-- Name: waypoint_id_waypoint_seq; Type: SEQUENCE; Schema: 4sem; Owner: postgres
--

ALTER TABLE "4sem".waypoint ALTER COLUMN id_waypoint ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME "4sem".waypoint_id_waypoint_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 3368 (class 0 OID 19562)
-- Dependencies: 214
-- Data for Name: carriage; Type: TABLE DATA; Schema: 4sem; Owner: postgres
--



--
-- TOC entry 3374 (class 0 OID 19584)
-- Dependencies: 220
-- Data for Name: desttination; Type: TABLE DATA; Schema: 4sem; Owner: postgres
--

INSERT INTO "4sem".desttination (id_desttination, item_name, sattelment_category) OVERRIDING SYSTEM VALUE VALUES (1, 'Белоостров          ', 'village             ');
INSERT INTO "4sem".desttination (id_desttination, item_name, sattelment_category) OVERRIDING SYSTEM VALUE VALUES (2, 'Левашово            ', 'village             ');
INSERT INTO "4sem".desttination (id_desttination, item_name, sattelment_category) OVERRIDING SYSTEM VALUE VALUES (3, 'Санкт-Петербург     ', 'city                ');
INSERT INTO "4sem".desttination (id_desttination, item_name, sattelment_category) OVERRIDING SYSTEM VALUE VALUES (4, 'Репино              ', 'village             ');


--
-- TOC entry 3376 (class 0 OID 19590)
-- Dependencies: 222
-- Data for Name: passenger; Type: TABLE DATA; Schema: 4sem; Owner: postgres
--



--
-- TOC entry 3366 (class 0 OID 19556)
-- Dependencies: 212
-- Data for Name: place; Type: TABLE DATA; Schema: 4sem; Owner: postgres
--



--
-- TOC entry 3364 (class 0 OID 19550)
-- Dependencies: 210
-- Data for Name: ticket; Type: TABLE DATA; Schema: 4sem; Owner: postgres
--



--
-- TOC entry 3370 (class 0 OID 19568)
-- Dependencies: 216
-- Data for Name: train; Type: TABLE DATA; Schema: 4sem; Owner: postgres
--



--
-- TOC entry 3372 (class 0 OID 19576)
-- Dependencies: 218
-- Data for Name: waypoint; Type: TABLE DATA; Schema: 4sem; Owner: postgres
--



--
-- TOC entry 3383 (class 0 OID 0)
-- Dependencies: 213
-- Name: carriage_id_carriage_seq; Type: SEQUENCE SET; Schema: 4sem; Owner: postgres
--

SELECT pg_catalog.setval('"4sem".carriage_id_carriage_seq', 1, false);


--
-- TOC entry 3384 (class 0 OID 0)
-- Dependencies: 219
-- Name: desttination_id_desttination_seq; Type: SEQUENCE SET; Schema: 4sem; Owner: postgres
--

SELECT pg_catalog.setval('"4sem".desttination_id_desttination_seq', 4, true);


--
-- TOC entry 3385 (class 0 OID 0)
-- Dependencies: 221
-- Name: passenger_id_passenger_seq; Type: SEQUENCE SET; Schema: 4sem; Owner: postgres
--

SELECT pg_catalog.setval('"4sem".passenger_id_passenger_seq', 1, false);


--
-- TOC entry 3386 (class 0 OID 0)
-- Dependencies: 211
-- Name: place_id_place_seq; Type: SEQUENCE SET; Schema: 4sem; Owner: postgres
--

SELECT pg_catalog.setval('"4sem".place_id_place_seq', 1, false);


--
-- TOC entry 3387 (class 0 OID 0)
-- Dependencies: 209
-- Name: ticket_train_number_seq; Type: SEQUENCE SET; Schema: 4sem; Owner: postgres
--

SELECT pg_catalog.setval('"4sem".ticket_train_number_seq', 1, false);


--
-- TOC entry 3388 (class 0 OID 0)
-- Dependencies: 215
-- Name: train_id_train_seq; Type: SEQUENCE SET; Schema: 4sem; Owner: postgres
--

SELECT pg_catalog.setval('"4sem".train_id_train_seq', 1, false);


--
-- TOC entry 3389 (class 0 OID 0)
-- Dependencies: 217
-- Name: waypoint_id_waypoint_seq; Type: SEQUENCE SET; Schema: 4sem; Owner: postgres
--

SELECT pg_catalog.setval('"4sem".waypoint_id_waypoint_seq', 1, false);


--
-- TOC entry 3199 (class 2606 OID 19566)
-- Name: carriage carriage_pkey; Type: CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".carriage
    ADD CONSTRAINT carriage_pkey PRIMARY KEY (id_carriage);


--
-- TOC entry 3205 (class 2606 OID 19588)
-- Name: desttination desttination_pkey; Type: CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".desttination
    ADD CONSTRAINT desttination_pkey PRIMARY KEY (id_desttination);


--
-- TOC entry 3207 (class 2606 OID 19594)
-- Name: passenger passenger_pkey; Type: CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".passenger
    ADD CONSTRAINT passenger_pkey PRIMARY KEY (id_passenger);


--
-- TOC entry 3197 (class 2606 OID 19560)
-- Name: place place_pkey; Type: CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".place
    ADD CONSTRAINT place_pkey PRIMARY KEY (id_place);


--
-- TOC entry 3195 (class 2606 OID 19554)
-- Name: ticket ticket_pkey; Type: CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".ticket
    ADD CONSTRAINT ticket_pkey PRIMARY KEY (train_number);


--
-- TOC entry 3201 (class 2606 OID 19574)
-- Name: train train_pkey; Type: CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".train
    ADD CONSTRAINT train_pkey PRIMARY KEY (id_train);


--
-- TOC entry 3203 (class 2606 OID 19582)
-- Name: waypoint waypoint_pkey; Type: CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".waypoint
    ADD CONSTRAINT waypoint_pkey PRIMARY KEY (id_waypoint);


--
-- TOC entry 3217 (class 2606 OID 19620)
-- Name: carriage carriage_id_train_fkey; Type: FK CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".carriage
    ADD CONSTRAINT carriage_id_train_fkey FOREIGN KEY (id_train) REFERENCES "4sem".train(id_train) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3219 (class 2606 OID 19660)
-- Name: carriage carriage_id_train_fkey1; Type: FK CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".carriage
    ADD CONSTRAINT carriage_id_train_fkey1 FOREIGN KEY (id_train) REFERENCES "4sem".train(id_train) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3216 (class 2606 OID 19615)
-- Name: carriage carriage_place_id_fkey; Type: FK CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".carriage
    ADD CONSTRAINT carriage_place_id_fkey FOREIGN KEY (place_id) REFERENCES "4sem".place(id_place) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3218 (class 2606 OID 19655)
-- Name: carriage carriage_place_id_fkey1; Type: FK CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".carriage
    ADD CONSTRAINT carriage_place_id_fkey1 FOREIGN KEY (place_id) REFERENCES "4sem".place(id_place) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3214 (class 2606 OID 19610)
-- Name: place place_id_carriage_fkey; Type: FK CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".place
    ADD CONSTRAINT place_id_carriage_fkey FOREIGN KEY (id_carriage) REFERENCES "4sem".carriage(id_carriage) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3215 (class 2606 OID 19650)
-- Name: place place_id_carriage_fkey1; Type: FK CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".place
    ADD CONSTRAINT place_id_carriage_fkey1 FOREIGN KEY (id_carriage) REFERENCES "4sem".carriage(id_carriage) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3209 (class 2606 OID 19600)
-- Name: ticket ticket_id_desttination_fkey; Type: FK CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".ticket
    ADD CONSTRAINT ticket_id_desttination_fkey FOREIGN KEY (id_desttination) REFERENCES "4sem".desttination(id_desttination) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3212 (class 2606 OID 19640)
-- Name: ticket ticket_id_desttination_fkey1; Type: FK CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".ticket
    ADD CONSTRAINT ticket_id_desttination_fkey1 FOREIGN KEY (id_desttination) REFERENCES "4sem".desttination(id_desttination) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3210 (class 2606 OID 19605)
-- Name: ticket ticket_id_passengers_fkey; Type: FK CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".ticket
    ADD CONSTRAINT ticket_id_passengers_fkey FOREIGN KEY (id_passengers) REFERENCES "4sem".passenger(id_passenger) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3213 (class 2606 OID 19645)
-- Name: ticket ticket_id_passengers_fkey1; Type: FK CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".ticket
    ADD CONSTRAINT ticket_id_passengers_fkey1 FOREIGN KEY (id_passengers) REFERENCES "4sem".passenger(id_passenger) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3208 (class 2606 OID 19595)
-- Name: ticket ticket_id_place_fkey; Type: FK CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".ticket
    ADD CONSTRAINT ticket_id_place_fkey FOREIGN KEY (id_place) REFERENCES "4sem".place(id_place) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3211 (class 2606 OID 19635)
-- Name: ticket ticket_id_place_fkey1; Type: FK CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".ticket
    ADD CONSTRAINT ticket_id_place_fkey1 FOREIGN KEY (id_place) REFERENCES "4sem".place(id_place) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3221 (class 2606 OID 19630)
-- Name: waypoint waypoint_id_desttination_fkey; Type: FK CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".waypoint
    ADD CONSTRAINT waypoint_id_desttination_fkey FOREIGN KEY (id_desttination) REFERENCES "4sem".desttination(id_desttination) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3223 (class 2606 OID 19670)
-- Name: waypoint waypoint_id_desttination_fkey1; Type: FK CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".waypoint
    ADD CONSTRAINT waypoint_id_desttination_fkey1 FOREIGN KEY (id_desttination) REFERENCES "4sem".desttination(id_desttination) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3220 (class 2606 OID 19625)
-- Name: waypoint waypoint_id_train_fkey; Type: FK CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".waypoint
    ADD CONSTRAINT waypoint_id_train_fkey FOREIGN KEY (id_train) REFERENCES "4sem".train(id_train) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3222 (class 2606 OID 19665)
-- Name: waypoint waypoint_id_train_fkey1; Type: FK CONSTRAINT; Schema: 4sem; Owner: postgres
--

ALTER TABLE ONLY "4sem".waypoint
    ADD CONSTRAINT waypoint_id_train_fkey1 FOREIGN KEY (id_train) REFERENCES "4sem".train(id_train) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


-- Completed on 2022-10-02 22:47:12

--
-- PostgreSQL database dump complete
--

