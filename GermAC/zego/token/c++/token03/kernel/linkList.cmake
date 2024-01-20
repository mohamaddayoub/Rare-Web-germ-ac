set(LINK_LIBRARY)

if(WIN32)
	list(APPEND LINK_LIBRARY ws2_32.lib)
elseif(LINUX)
endif()

message(STATUS "* target_link_libraries ${LINK_LIBRARY}")

set_property(TARGET ${PROJECT_NAME} PROPERTY LINK_INTERFACE_MULTIPLICITY 3)

target_link_libraries(${PROJECT_NAME} PRIVATE  ${LINK_LIBRARY} )