--
-- PostgreSQL database dump
--

-- Dumped from database version 14.1
-- Dumped by pg_dump version 14.1

-- Started on 2021-12-31 12:00:28

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
-- TOC entry 3343 (class 1262 OID 32768)
-- Name: community; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE community WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Portuguese_Brazil.1252';


ALTER DATABASE community OWNER TO postgres;

\connect community

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 210 (class 1259 OID 32821)
-- Name: chat; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.chat (
    id integer NOT NULL,
    user_to integer,
    user_from integer,
    message character varying(255),
    date timestamp without time zone
);


ALTER TABLE public.chat OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 32820)
-- Name: chat_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.chat_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.chat_id_seq OWNER TO postgres;

--
-- TOC entry 3344 (class 0 OID 0)
-- Dependencies: 209
-- Name: chat_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.chat_id_seq OWNED BY public.chat.id;


--
-- TOC entry 214 (class 1259 OID 32856)
-- Name: friends; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.friends (
    id integer NOT NULL,
    user_to integer,
    user_from integer,
    status character varying(255)
);


ALTER TABLE public.friends OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 32855)
-- Name: friends_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.friends_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.friends_id_seq OWNER TO postgres;

--
-- TOC entry 3345 (class 0 OID 0)
-- Dependencies: 213
-- Name: friends_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.friends_id_seq OWNED BY public.friends.id;


--
-- TOC entry 216 (class 1259 OID 32872)
-- Name: groups; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.groups (
    id integer NOT NULL,
    users character varying(255),
    name character varying(255),
    image character varying(255)
);


ALTER TABLE public.groups OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 32871)
-- Name: groups_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.groups_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.groups_id_seq OWNER TO postgres;

--
-- TOC entry 3346 (class 0 OID 0)
-- Dependencies: 215
-- Name: groups_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.groups_id_seq OWNED BY public.groups.id;


--
-- TOC entry 212 (class 1259 OID 32847)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    name character varying(255),
    email character varying(255),
    password character varying(255),
    image character varying(255),
    description character varying(255),
    slug character varying(255)
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 32846)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 3347 (class 0 OID 0)
-- Dependencies: 211
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 3179 (class 2604 OID 32824)
-- Name: chat id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.chat ALTER COLUMN id SET DEFAULT nextval('public.chat_id_seq'::regclass);


--
-- TOC entry 3181 (class 2604 OID 32859)
-- Name: friends id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.friends ALTER COLUMN id SET DEFAULT nextval('public.friends_id_seq'::regclass);


--
-- TOC entry 3182 (class 2604 OID 32875)
-- Name: groups id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.groups ALTER COLUMN id SET DEFAULT nextval('public.groups_id_seq'::regclass);


--
-- TOC entry 3180 (class 2604 OID 32850)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 3331 (class 0 OID 32821)
-- Dependencies: 210
-- Data for Name: chat; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.chat (id, user_to, user_from, message, date) VALUES (62, 19, 18, 'Hello friend!', '2021-12-12 12:24:43');
INSERT INTO public.chat (id, user_to, user_from, message, date) VALUES (63, 18, 19, 'Hello!', '2021-12-12 12:24:48');
INSERT INTO public.chat (id, user_to, user_from, message, date) VALUES (64, 19, 18, 'Tudo bem?', '2021-12-12 12:24:57');
INSERT INTO public.chat (id, user_to, user_from, message, date) VALUES (65, 18, 19, 'tudo...', '2021-12-12 12:25:02');


--
-- TOC entry 3335 (class 0 OID 32856)
-- Dependencies: 214
-- Data for Name: friends; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.friends (id, user_to, user_from, status) VALUES (6, 19, 18, 'pending');
INSERT INTO public.friends (id, user_to, user_from, status) VALUES (7, 20, 18, 'pending');
INSERT INTO public.friends (id, user_to, user_from, status) VALUES (8, 21, 18, 'pending');
INSERT INTO public.friends (id, user_to, user_from, status) VALUES (9, 18, 19, 'pending');


--
-- TOC entry 3337 (class 0 OID 32872)
-- Dependencies: 216
-- Data for Name: groups; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.groups (id, users, name, image) VALUES (12, '18', 'Coders Lovers', 'song-one.jpg');
INSERT INTO public.groups (id, users, name, image) VALUES (13, '18', 'Programmers', 'song-two.png');
INSERT INTO public.groups (id, users, name, image) VALUES (15, '18', 'Crazy for codes', 'song-eight.png');
INSERT INTO public.groups (id, users, name, image) VALUES (16, '18', 'Only madmen know', 'song-six.png');


--
-- TOC entry 3333 (class 0 OID 32847)
-- Dependencies: 212
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.users (id, name, email, password, image, description, slug) VALUES (18, 'Raissa Dev', 'raissa.fullstack@gmail.com', '12345678', 'myImg.png', 'Desenvolvedora Full-stack & Mobile', 'Dev');
INSERT INTO public.users (id, name, email, password, image, description, slug) VALUES (19, 'Jhon Doe', 'jhon@doe.com', '12345678', 'user-one.png', 'Lorem ipsum sis amet dolor', 'Designer');
INSERT INTO public.users (id, name, email, password, image, description, slug) VALUES (20, 'Amanda Doe', 'amanda@doe.com', '12345678', 'song-two.png', 'Consectetur adipiscing elit. Mauris tempus efficitur ultrices.', 'Enginer');
INSERT INTO public.users (id, name, email, password, image, description, slug) VALUES (21, 'Harry Potter', 'harry@potter.com', '12345678', 'song-three.png', 'Nullam congue et justo ut mollis.', 'Product Owner');


--
-- TOC entry 3348 (class 0 OID 0)
-- Dependencies: 209
-- Name: chat_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.chat_id_seq', 65, true);


--
-- TOC entry 3349 (class 0 OID 0)
-- Dependencies: 213
-- Name: friends_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.friends_id_seq', 9, true);


--
-- TOC entry 3350 (class 0 OID 0)
-- Dependencies: 215
-- Name: groups_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.groups_id_seq', 16, true);


--
-- TOC entry 3351 (class 0 OID 0)
-- Dependencies: 211
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 21, true);


--
-- TOC entry 3184 (class 2606 OID 32826)
-- Name: chat chat_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.chat
    ADD CONSTRAINT chat_pkey PRIMARY KEY (id);


--
-- TOC entry 3188 (class 2606 OID 32861)
-- Name: friends friends_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.friends
    ADD CONSTRAINT friends_pkey PRIMARY KEY (id);


--
-- TOC entry 3190 (class 2606 OID 32879)
-- Name: groups groups_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.groups
    ADD CONSTRAINT groups_pkey PRIMARY KEY (id);


--
-- TOC entry 3186 (class 2606 OID 32854)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


-- Completed on 2021-12-31 12:00:29

--
-- PostgreSQL database dump complete
--

