CREATE TABLE public.Event (
      ID SERIAL PRIMARY KEY
    , NAME  VARCHAR(50) NOT NULL
    , MONTH SMALLINT    NOT NULL
    , YEAR  SMALLINT    NOT NULL
);

-- Indexes
CREATE INDEX IX_Event_Name      ON public.Event (NAME);
CREATE INDEX IX_Event_MonthYear ON public.Event (MONTH, YEAR);

-- Event Sessions
CREATE TABLE public.Sessions (
      ID SERIAL PRIMARY KEY
    , EVENTID INT         NOT NULL REFERENCES public.Event(ID)
    , NAME    VARCHAR(50) NOT NULL
);

-- Index
CREATE INDEX IX_Sessions_Name ON public.Sesions(NAME);

-- Speakers
CREATE TABLE public.Speakers (
      ID SERIAL PRIMARY KEY
    , SESSIONID INT         NOT NULL REFERENCES public.Sessions(ID)
    , NAME      VARCHAR(50) NOT NULL
    , TITLE     VARCHAR(50) NOT NULL
);

-- Index
CREATE INDEX IX_Speakers_Name ON public.Sessions (NAME);

-- Users
CREATE TABLE public.Users (
      ID SERIAL PRIMARY KEY
    , USERNAME  VARCHAR(30) NOT NULL UNIQUE
    , PASSWORD  VARCHAR(30) NOT NULL
    , EMAIL     VARCHAR(50) NOT NULL
    , FIRSTNAME VARCHAR(30) NOT NULL
    , LASTNAME  VARCHAR(30) NOT NULL
);

-- Index
CREATE INDEX UX_Users_Username ON public.Users (USERNAME);
CREATE INDEX IX_Users_Name     ON public.Users (LASTNAME, FIRSTNAME);

-- Notes
CREATE TABLE public.Notes (
      ID SERIAL PRIMARY KEY
    , USERID    INT         NOT NULL REFERENCES public.Users(ID)
    , SPEAKERID INT         NOT NULL REFERENCES public.Speakers(ID)
    , TITLE     VARCHAR(50) NOT NULL
    , NOTES     TEXT NULL
);

-- Index
CREATE INDEX IX_Notes_Title ON public.Notes (TITLE);

-- User rows
INSERT INTO public.users
    ( username
    , password
    , email
    , firstname
    , lastname)
VALUES
    ( 'fitfour'
    , '1234'
    , 'whe10002@byui.edu'
    , 'Keith'
    , 'Wheeler');
INSERT INTO public.users
    ( username
    , password
    , email
    , firstname
    , lastname)
VALUES
    ( 'caflores'
    , '1234'
    , 'flo16027@byui.edu'
    , 'Catherine'
    , 'Flores');

-- Event rows
INSERT INTO public.event 
    ( name
    , month
    , year) 
VALUES
    ('186th Annual General Conference'
    , 4
    , 2016);

INSERT INTO public.event 
    ( name
    , month
    , year) 
VALUES
    ( '186th Semi-Annual General Conference'
    , 10
    , 2016);

-- Session rows
INSERT INTO public.sessions
    ( eventid
    , name) 
VALUES
    ( 1
    , 'General Women''s');

INSERT INTO public.sessions
    ( eventid
    , name) 
VALUES
    ( 1
    , 'Saturday Morning');

INSERT INTO public.sessions
    ( eventid
    , name) 
VALUES
    ( 1
    , 'Saturday Afternoon');

INSERT INTO public.sessions
    ( eventid
    , name) 
VALUES
    ( 1
    , 'Priesthood');

INSERT INTO public.sessions
    ( eventid
    , name) 
VALUES
    ( 1
    , 'Sunday Morning');

-- Speaker rows
INSERT INTO public.speakers
    ( sessionId
    , name
    , title) 
VALUES
    ( 1
    , 'Cheryl A. Esplin'
    , 'He Asks Us to Be His Hands');

INSERT INTO public.speakers
    ( sessionId 
    , name
    , title) 
VALUES
    ( 1
    , 'Neill F. Marriott'
    , 'What Shall We Do?');

INSERT INTO public.speakers
    ( sessionId
    , name
    , title) 
VALUES
    ( 1
    , 'Linda K. Burton'
    , 'I Was a Stranger');

INSERT INTO public.speakers
    ( sessionId
    , name
    , title) 
VALUES
    ( 1
    , 'Henry B. Eyring'
    , 'Trust in That Spirit Which Leadeth to Do Good');

-- Notes rows
INSERT INTO public.Notes
    ( userId
    , speakerId
    , title
    , notes) 
VALUES
    ( 1
    , 1
    , 'Note Title 1'
    , 'Actual Note fitfour');

INSERT INTO public.Notes
    ( userId
    , speakerId
    , title
    , notes) 
VALUES
    ( 1
    , 1
    , 'Note Title 1'
    , 'Actual Note caflores');

INSERT INTO public.Notes
    ( userId
    , speakerId
    , title
    , notes) 
VALUES
    ( 1
    , 2
    , 'Note Title 2'
    , 'Actual Note caflores');

INSERT INTO public.Notes
    ( userId
    , speakerId
    , title
    , notes) 
VALUES
    ( 2
    , 3
    , 'Note Title 2'
    , 'Actual Note fitfour');

INSERT INTO public.Notes
    ( userId
    , speakerId
    , title
    , notes) 
VALUES
    ( 2
    , 4
    , 'Note Title 3'
    , 'Actual Note fitfour');

INSERT INTO public.Notes
    ( userId
    , speakerId
    , title
    , notes) 
    VALUES
    ( 2
    , 1
    , 'Note Title 3'
    , 'Actual Note caflores');

SELECT et.Name, et.Month, et.Year, sn.Name, sp.Name, sp.Title, nt.Title, nt.Notes, ur.UserName, ur.Email 
	FROM public.event AS et
        JOIN public.sessions AS sn ON et.id=sn.EventId
        JOIN public.speakers AS sp ON sn.Id=sp.sessionId
        JOIN public.Notes AS nt ON sp.Id=nt.speakerId
JOIN public.Users AS ur ON nt.UserId=ur.Id
