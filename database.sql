PGDMP     $    ,                y         	   community    14.1    14.1                 0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    32768 	   community    DATABASE     i   CREATE DATABASE community WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Portuguese_Brazil.1252';
    DROP DATABASE community;
                postgres    false            �            1259    32821    chat    TABLE     �   CREATE TABLE public.chat (
    id integer NOT NULL,
    user_to integer,
    user_from integer,
    message character varying(255),
    date timestamp without time zone
);
    DROP TABLE public.chat;
       public         heap    postgres    false            �            1259    32820    chat_id_seq    SEQUENCE     �   CREATE SEQUENCE public.chat_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.chat_id_seq;
       public          postgres    false    210                       0    0    chat_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.chat_id_seq OWNED BY public.chat.id;
          public          postgres    false    209            �            1259    32856    friends    TABLE     �   CREATE TABLE public.friends (
    id integer NOT NULL,
    user_to integer,
    user_from integer,
    status character varying(255)
);
    DROP TABLE public.friends;
       public         heap    postgres    false            �            1259    32855    friends_id_seq    SEQUENCE     �   CREATE SEQUENCE public.friends_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.friends_id_seq;
       public          postgres    false    214                       0    0    friends_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.friends_id_seq OWNED BY public.friends.id;
          public          postgres    false    213            �            1259    32872    groups    TABLE     �   CREATE TABLE public.groups (
    id integer NOT NULL,
    users character varying(255),
    name character varying(255),
    image character varying(255)
);
    DROP TABLE public.groups;
       public         heap    postgres    false            �            1259    32871    groups_id_seq    SEQUENCE     �   CREATE SEQUENCE public.groups_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.groups_id_seq;
       public          postgres    false    216                       0    0    groups_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.groups_id_seq OWNED BY public.groups.id;
          public          postgres    false    215            �            1259    32847    users    TABLE     
  CREATE TABLE public.users (
    id integer NOT NULL,
    name character varying(255),
    email character varying(255),
    password character varying(255),
    image character varying(255),
    description character varying(255),
    slug character varying(255)
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    32846    users_id_seq    SEQUENCE     �   CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    212                       0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    211            k           2604    32824    chat id    DEFAULT     b   ALTER TABLE ONLY public.chat ALTER COLUMN id SET DEFAULT nextval('public.chat_id_seq'::regclass);
 6   ALTER TABLE public.chat ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    209    210    210            m           2604    32859 
   friends id    DEFAULT     h   ALTER TABLE ONLY public.friends ALTER COLUMN id SET DEFAULT nextval('public.friends_id_seq'::regclass);
 9   ALTER TABLE public.friends ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    213    214    214            n           2604    32875 	   groups id    DEFAULT     f   ALTER TABLE ONLY public.groups ALTER COLUMN id SET DEFAULT nextval('public.groups_id_seq'::regclass);
 8   ALTER TABLE public.groups ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    216    215    216            l           2604    32850    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    212    211    212                      0    32821    chat 
   TABLE DATA           E   COPY public.chat (id, user_to, user_from, message, date) FROM stdin;
    public          postgres    false    210   v                  0    32856    friends 
   TABLE DATA           A   COPY public.friends (id, user_to, user_from, status) FROM stdin;
    public          postgres    false    214   �        	          0    32872    groups 
   TABLE DATA           8   COPY public.groups (id, users, name, image) FROM stdin;
    public          postgres    false    216   �                  0    32847    users 
   TABLE DATA           T   COPY public.users (id, name, email, password, image, description, slug) FROM stdin;
    public          postgres    false    212   O!                  0    0    chat_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.chat_id_seq', 56, true);
          public          postgres    false    209                       0    0    friends_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.friends_id_seq', 8, true);
          public          postgres    false    213                       0    0    groups_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.groups_id_seq', 16, true);
          public          postgres    false    215                       0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 21, true);
          public          postgres    false    211            p           2606    32826    chat chat_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.chat
    ADD CONSTRAINT chat_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.chat DROP CONSTRAINT chat_pkey;
       public            postgres    false    210            t           2606    32861    friends friends_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.friends
    ADD CONSTRAINT friends_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.friends DROP CONSTRAINT friends_pkey;
       public            postgres    false    214            v           2606    32879    groups groups_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.groups
    ADD CONSTRAINT groups_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.groups DROP CONSTRAINT groups_pkey;
       public            postgres    false    216            r           2606    32854    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    212                  x������ � �         (   x�3�4��4��,H�K��K�2�42@�[p"�c���� Y��      	   t   x�34�4��t�OI-*V��/R���y��y�zY�\�� E��E���p��|��<��)XQbU�BZ~�B2�$������"3�"���J��Ĕ��<���r����
��=... � -	           x�m�=O1��ܯ���W��VDA�(T�]B�M]��'W�ߓ���e?��n�>4�hX�b��.;'I�����\kثn~qyu}�P���m;�V(Fv#�5<��Y]�3X�'9,#c�ݪ�=X1�C	˞�72���W������=;���l����՝ס��k��v��\��M#�C�:J-�u�E��Y w;24f�"�V=K�ܩ'�	6�F����P�����?g���h�t3B9�%1������D�I�~�D۶i�o2��V     