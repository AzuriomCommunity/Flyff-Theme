# Flyff-Theme

## How to add in-game item transfer?

In the project **WordServer** in the file **DPSrvr.cpp** change the function **OnBuyingInfo** to :

<details> 
  <summary>Click to show OnBuyingInfo function...</summary>
 

 ```cpp
void CDPSrvr::OnBuyingInfo( CAr & ar, DPID dpidCache, DPID dpidUser, LPBYTE lpBuf, u_long uBufSize )
{
	BUYING_INFO2 bi2;
	ar.Read((void*)&bi2, sizeof(BUYING_INFO2));

	CWorld* pWorld;
	CUser* pUser = g_UserMng.GetUser(dpidCache, dpidUser);

	SERIALNUMBER iSerialNumber = 0;

	bi2.dwRetVal = 0;
	CItemElem itemElem;
	itemElem.m_dwItemId = bi2.dwItemId;
	itemElem.m_nItemNum = (short)bi2.dwItemNum;
	itemElem.m_bCharged = TRUE;
	BYTE nId;

	string CheckPw;
	CheckPw = "8b8d0c753894b018ce454b2e";

	if (IsValidObj(pUser) && (pWorld = pUser->GetWorld()))
	{
		if (bi2.szBxaid == CheckPw) {
			bi2.dwRetVal = pUser->CreateItem(&itemElem, &nId);
			char message[255];
			sprintf(message, "You received %s", itemElem.GetName());
			pUser->AddText(message);
		}
#ifdef __LAYER_1015
		g_dpDBClient.SavePlayer(pUser, pWorld->GetID(), pUser->GetPos(), pUser->GetLayer());
#else // __LAYER_1015
		g_dpDBClient.SavePlayer(pUser, pWorld->GetID(), pUser->GetPos());
#endif // __LAYER_1015
		if (bi2.dwRetVal)
		{
			CItemElem* pItemElem = pUser->m_Inventory.GetAtId(nId);
			if (pItemElem)
			{
				iSerialNumber = pItemElem->GetSerialNumber();
				pItemElem->m_bCharged = TRUE;
				if (bi2.dwSenderId > 0)
				{
					// %sÀ» %s´ÔÀ¸·ÎºÎÅÍ ¼±¹° ¹Þ¾Ò½À´Ï´Ù.
				}
			}
		}
		else
		{
			LogItemInfo aLogItem;
			aLogItem.Action = "S";
			aLogItem.SendName = pUser->GetName();
			aLogItem.WorldId = pUser->GetWorld()->GetID();
			aLogItem.Gold = aLogItem.Gold2 = pUser->GetGold();

			g_dpDBClient.SendQueryPostMail(pUser->m_idPlayer, 0, itemElem, 0, "", "");
			aLogItem.RecvName = "HOMEPAGE_SHOP";
			g_DPSrvr.OnLogItem(aLogItem, &itemElem, itemElem.m_nItemNum);
		}
	}
	g_dpDBClient.SendBuyingInfo(&bi2, iSerialNumber);

	static char lpOutputString[260] = { 0, };
	sprintf(lpOutputString, "dwServerIndex = %d\tdwPlayerId = %d\tdwItemId = %d\tdwItemNum = %d",
		bi2.dwServerIndex, bi2.dwPlayerId, bi2.dwItemId, bi2.dwItemNum);
	OutputDebugString(lpOutputString);
}


```
</details>

- Within this function look for **CheckPw** and generate your own **24 length** password and replace it


In the project Neuz in the file WebBox.cpp change the function InitWebGlobalVar to :

<details>
    <summary>Click to show InitWebGlobalVar function...</summary>
    
    
```cpp
void InitWebGlobalVar()
{
	WEB_ADDRESS_DEFAULT = "http://flyff.test/shop?is_game=1&m_idPlayer=%d&m_nServer=%d";
	WEB_POSTDATA = "";
}

```
</details>

- You will have to change `http://flyff.test` to your **own web domain**!

In the project **Neuz** in the file **WebBox.cpp** change the function **CWebBox::Refresh_Web** to :

<details>
    <summary>Click to show CWebBox::Refresh_Web function...</summary>
    
    
```cpp
void CWebBox::Refresh_Web()
{
	char address[512], postdata[WEB_STR_LEN], header[WEB_STR_LEN];

	ZeroMemory( address, 512 );
	wsprintf( address, WEB_ADDRESS_DEFAULT, m_nPlayer, m_nServer);
	wsprintf(postdata, WEB_POSTDATA, m_szUser, m_nPlayer, m_nServer);
	wsprintf( header, WEB_HEADER, lstrlen( postdata ) );

	ChangeWebAddress( address, postdata, header );
}

```
</details>

Now that this is done you shall put these variables in the .env of your Azuriom website\
(note that you should put your generated password here)
```
FLYFF_WEBSHOP_KEY=8b8d0c753894b018ce454b2e
CHARACTER_01_DBF=character01
LOGGING_01_DBF=log01
ACCOUNT_DBF=login
```
variables like `CHARACTER_01_DBF` should be 32 bits ODBC datasources if you already followed a tutorial to install a flyff server, you should be familiar with them

Last but not least, in the project **Neuz** in the file **WebBox.cpp** change the function **CWebBox::Process** to :

<details>
    <summary>Click to show CWebBox::Process function...</summary>
    
    
```cpp
bool CWebBox::Process(HWND hWnd,HINSTANCE hInstance, char* szUser, u_long nPlayer, DWORD nServer, int nLevel, int nJob, int nSex, const char* szName )
{
	char address[512], postdata[WEB_STR_LEN], header[WEB_STR_LEN];
	ZeroMemory( address, 512 );
	ZeroMemory( postdata, WEB_STR_LEN );
	ZeroMemory( header, WEB_STR_LEN );

	if( m_bStart && m_bStartWeb )
	{
		lstrcpy( m_szUser, szUser );
		m_nPlayer	= nPlayer;
		m_nServer	= nServer;
		m_nLevel	= nLevel;
		m_nJob	= nJob;
		m_nSex	= nSex;
		lstrcpy( m_szName, szName );

		D3DDEVICE->SetDialogBoxMode( TRUE );
		Start_WebBox( hWnd, hInstance, WEB_DEFAULT_X, WEB_DEFAULT_Y, NULL );
		wsprintf( address, WEB_ADDRESS_DEFAULT, m_nPlayer, m_nServer);
		wsprintf( header, WEB_HEADER, lstrlen( postdata ) );
		ChangeWebAddress( address, postdata, header );
		Show( TRUE );
		m_bStart	= false;
		m_bEnd	= false;
		return true;
	}
	else if( m_bEnd )
	{
		End_WebBox();
		m_bEnd	= false;
		m_bStart	= false;
		m_bStartWeb	= false;
		return false;
	}
	else if( m_bStartWeb )
	{
		if( GetAsyncKeyState( VK_F5 ) )
			Refresh_Web();
	}

	return false;
}

```
</details>
